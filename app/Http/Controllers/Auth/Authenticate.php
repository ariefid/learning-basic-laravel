<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers\AuthenticationHelper;
use App\Http\Requests\Auth\LoginRequest;

class Authenticate extends Controller
{
    /**
     * Login view.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewLogin(): \Illuminate\Http\Response
    {
        return response()->view('auth.login');
    }

    /**
     * Login function.
     *
     * @param LoginRequest $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        $account = collect($request->validated());

        $auth = AuthenticationHelper::attempt($account->only(['account', 'password', 'remember']));

        if (!$auth) {
            return redirect()->route('web.account.login')->withInput($request->input())->withErrors([
                'loginFailed' => 'Account information doesn\'t match in our database.',
            ]);
        }

        $user = Auth::user();

        return redirect()->route('web.index')->with([
            'loginSuccess' => 'Welcome back, ' . ($user->username ?? $user->email),
        ]);
    }

    /**
     * Logout function.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): \Illuminate\Http\RedirectResponse
    {
        AuthenticationHelper::logoutCurrentDevice();

        return redirect()->route('web.account.login')->with([
            'logoutSuccess' => 'You have logged out successfully.',
        ]);
    }
}
