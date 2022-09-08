<?php

use App\Helpers\AuthenticationHelper;
use App\Http\Controllers\Auth\Authenticate;
use App\Http\Controllers\Auth\ChangePassword;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Dash\Dashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => null, 'middleware' => ['prevent-back-history'], 'as' => 'web.'], function () {
    Route::match(['get', 'head'], null, [Dashboard::class, 'index'])->middleware(['auth', 'verified:web.account.notverified'])->name('index');

    Route::group(['prefix' => 'account', 'middleware' => [], 'as' => 'account.'], function () {
        Route::match(['get', 'head'], 'register', [Register::class, 'viewRegister'])->middleware(['guest'])->name('register');

        Route::match(['post'], 'register', [Register::class, 'store'])->middleware(['guest'])->name('register');

        Route::match(['get', 'head'], 'login', [Authenticate::class, 'viewLogin'])->middleware(['guest'])->name('login');

        Route::match(['post'], 'login', [Authenticate::class, 'login'])->middleware(['guest'])->name('login');

        Route::match(['get', 'head'], 'change-password', [ChangePassword::class, 'viewChangePassword'])->middleware(['auth', 'verified:web.account.notverified'])->name('change-password');

        Route::match(['put'], 'change-password', [ChangePassword::class, 'update'])->middleware(['auth', 'verified:web.account.notverified'])->name('change-password');

        Route::match(['get', 'head'], 'logout', [Authenticate::class, 'logout'])->middleware(['auth', 'verified:web.account.notverified'])->name('logout');

        Route::match(['get', 'head'], 'not-verified', function () {
            AuthenticationHelper::logout();

            return redirect()->route('web.account.login')->withErrors([
                'errorMessage' => 'You must verify your account.',
            ]);
        })->middleware([])->name('notverified');

        Route::fallback(function () {
            return response()->view('errors.404');
        });
    });

    Route::fallback(function () {
        return response()->view('errors.404');
    });
});
