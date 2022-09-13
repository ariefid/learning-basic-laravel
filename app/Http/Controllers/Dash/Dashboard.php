<?php

namespace App\Http\Controllers\Dash;

use App\Enums\TodoState;
use App\Http\Controllers\Controller;
use App\Models\Todo;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $todos = Todo::query()->whereIsPrivate(false)->whereState(TodoState::PUBLISH)->cursorPaginate();

        return response()->view('dash.dashboard', compact('todos'));
    }
}
