<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Helpers\AuthenticationHelper;
use App\Http\Requests\Auth\RegisterRequest;

class Register extends Controller
{
    /**
     * Register view.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewRegister(): \Illuminate\Http\Response
    {
        return response()->view('auth.register');
    }

    /**
     * Store function.
     *
     * @param RegisterRequest $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        $account = collect($request->validated())->toArray();

        $user = User::create($account);

        AuthenticationHelper::attempt(collect($account));

        return redirect()->route('web.index')->with([
            'registerSuccess' => 'Account ' . $user->email . ' has been created.',
        ]);
    }
}
