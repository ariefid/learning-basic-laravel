<?php

namespace App\Http\Controllers\Dash;

use App\Enums\TodoState;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dash\StoreTodoRequest;
use App\Http\Requests\Dash\UpdateTodoRequest;
use App\Models\Todo as TodoModel;
use App\Models\User;

class Todo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $todos = TodoModel::query()->whereUserId(auth()->user()->id)->cursorPaginate();

        return response()->view('dash.todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): \Illuminate\Http\Response
    {
        $todoState = TodoState::cases();

        return response()->view('dash.todos.create', compact('todoState'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTodoRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTodoRequest $request): \Illuminate\Http\RedirectResponse
    {
        $todo = User::find($request->user()->id);

        $todo->todos()->create($request->only([
            'name',
            'description',
            'is_private',
            'state',
        ]));

        return redirect()->back()->with(['successMessage' => 'Todo has been created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): \Illuminate\Http\Response
    {
        $todo = TodoModel::query()->whereUserId(auth()->user()->id)->whereUuid($id)->firstOrFail();

        return response()->view('dash.todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): \Illuminate\Http\Response
    {
        $todo = TodoModel::query()->whereUserId(auth()->user()->id)->whereUuid($id)->firstOrFail();

        $todoState = TodoState::cases();

        return response()->view('dash.todos.edit', compact('todo', 'todoState'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTodoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTodoRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $todo = TodoModel::query()->whereUserId($request->user()->id)->whereUuid($id)->firstOrFail();

        $todo->update($request->only([
            'name',
            'description',
            'is_private',
            'state',
        ]));

        return redirect()->back()->with(['successMessage' => 'Todo has been updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $todo = TodoModel::query()->whereUserId(auth()->user()->id)->whereUuid($id)->firstOrFail();

        $todo->delete();

        return redirect()->back()->with(['successMessage' => 'Todo has been deleted.']);
    }
}
