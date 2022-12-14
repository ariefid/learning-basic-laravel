@extends('templates.guest')

@section('title', 'Login')

@section('tagline', 'Sign in to your account')

@section('content')
    <form action="{{ route('web.account.login') }}" method="POST" class="space-y-6">
        @csrf
        <div
            class="px-3 py-2 border {{ $errors->has('account') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
            <label for="account" class="block text-xs font-medium text-gray-900"> Username / Email </label>
            <div class="mt-1">
                <input id="account" name="account" type="text" value="{{ old('account') }}" autocomplete="on" required
                    class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm">
            </div>
            @error('account')
                <div class="mt-1">
                    <span class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">
                        {{ $message }}
                    </span>
                </div>
            @enderror
        </div>

        <div class="px-3 py-2 border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 space-y-1"
            x-data="{ show: true }">
            <label for="password" class="block text-xs font-medium text-gray-900"> Password </label>
            <div class="relative mt-1">
                <input id="password" name="password" :type="show ? 'password' : 'text'" value="" autocomplete="on"
                    required class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm">
                <div class="absolute inset-y-0 right-0 flex items-center pr-0 text-sm leading-5 cursor-pointer"
                    x-on:click="show = !show">

                    <svg class="h-6 text-gray-700" fill="none" :class="{ 'hidden': !show, 'block': show }"
                        xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                        <path fill="currentColor"
                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                        </path>
                    </svg>

                    <svg class="h-6 text-gray-700" fill="none" :class="{ 'block': !show, 'hidden': show }"
                        xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                        <path fill="currentColor"
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                        </path>
                    </svg>

                </div>
            </div>
            @error('password')
                <div class="mt-1">
                    <span class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">
                        {{ $message }}
                    </span>
                </div>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input id="remember" name="remember" type="checkbox" value="1" @checked(old('remember'))
                    class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 cursor-pointer">
                <label for="remember" class="block ml-2 text-sm text-gray-900 cursor-pointer"> Remember me </label>
            </div>

            <div class="text-sm">
                &nbsp;
            </div>
        </div>

        <div>
            <button type="submit"
                class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign
                in</button>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('web.account.register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Register </a>
            </div>
        </div>
    </form>
@endsection
