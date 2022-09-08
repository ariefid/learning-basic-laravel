<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\AuthenticationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    /**
     * Change Password view.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewChangePassword(): \Illuminate\Http\Response
    {
        return response()->view('auth.change-password');
    }

    /**
     * Update function.
     *
     * @param ChangePasswordRequest $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function update(ChangePasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        $account = $request->validated();

        $user = User::find($request->user()->id);
        $user->update(['password' => $account['newpassword']]);

        AuthenticationHelper::logoutCurrentDevice();

        return redirect()->route('web.account.login')->with([
            'successMessage' => 'Password has been changed. Please, login again.',
        ]);
    }
}
