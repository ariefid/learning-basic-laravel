@extends('templates.app')

@section('title', 'Change Password')

@section('content')
    <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
        <div class="bg-white">
            <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mx-auto max-w-7xl">
                    <form action="{{ route('web.account.change-password') }}" method="POST" class="space-y-8">
                        @csrf
                        @method('put')
                        <div class="space-y-8">
                            <div>
                                <div>
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                                        @yield('title', null)
                                    </h3>
                                </div>
                                @if ($errors->has('errorMessage'))
                                    <div class="mt-2">
                                        <x-alert-danger>
                                            <x-slot:title>{{ $errors->default->first('errorMessage') ?? null }}
                                            </x-slot:title>
                                            <x-slot:description>{{ $errors->default->first('errorDescription') ?? null }}
                                            </x-slot:description>
                                        </x-alert-danger>
                                    </div>
                                @endif
                                @if (session('successMessage'))
                                    <div class="mt-2">
                                        <x-alert-success>
                                            <x-slot:title>{{ session('successMessage') ?? null }}</x-slot:title>
                                            <x-slot:description>{{ session('successDescription') ?? null }}
                                            </x-slot:description>
                                        </x-alert-success>
                                    </div>
                                @endif

                                <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                                    <div class="px-3 py-2 border {{ $errors->has('currentpassword') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 sm:col-span-6"
                                        x-data="{ show: true }">
                                        <label for="currentpassword" class="block text-xs font-medium text-gray-900">
                                            Current Password
                                        </label>
                                        <div class="relative flex mt-1 rounded-md shadow-sm">
                                            <input :type="show ? 'password' : 'text'" name="currentpassword"
                                                id="currentpassword" value="" autocomplete="on" required
                                                class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-5 cursor-pointer"
                                                x-on:click="show = !show">

                                                <svg class="h-6 text-gray-700" fill="none"
                                                    :class="{ 'hidden': !show, 'block': show }"
                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                    <path fill="currentColor"
                                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                    </path>
                                                </svg>

                                                <svg class="h-6 text-gray-700" fill="none"
                                                    :class="{ 'block': !show, 'hidden': show }"
                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                                    <path fill="currentColor"
                                                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                                    </path>
                                                </svg>

                                            </div>
                                        </div>
                                        @error('currentpassword')
                                            <div class="mt-1">
                                                <span
                                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">
                                                    {{ $message }}
                                                </span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="px-3 py-2 border {{ $errors->has('newpassword') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 sm:col-span-6"
                                        x-data="{ show: true }">
                                        <label for="newpassword" class="block text-xs font-medium text-gray-900">
                                            New Password
                                        </label>
                                        <div class="relative flex mt-1 rounded-md shadow-sm">
                                            <input :type="show ? 'password' : 'text'" name="newpassword" id="newpassword"
                                                value="" autocomplete="on" required
                                                class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-5 cursor-pointer"
                                                x-on:click="show = !show">

                                                <svg class="h-6 text-gray-700" fill="none"
                                                    :class="{ 'hidden': !show, 'block': show }"
                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                    <path fill="currentColor"
                                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                    </path>
                                                </svg>

                                                <svg class="h-6 text-gray-700" fill="none"
                                                    :class="{ 'block': !show, 'hidden': show }"
                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                                    <path fill="currentColor"
                                                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                                    </path>
                                                </svg>

                                            </div>
                                        </div>
                                        @error('newpassword')
                                            <div class="mt-1">
                                                <span
                                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">
                                                    {{ $message }}
                                                </span>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="px-3 py-2 border {{ $errors->has('newpassword_confirmation') ? 'border-red-500' : 'border-gray-300' }} rounded-md shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600 sm:col-span-6"
                                        x-data="{ show: true }">
                                        <label for="newpassword_confirmation"
                                            class="block text-xs font-medium text-gray-900">
                                            Confirm New Password
                                        </label>
                                        <div class="relative flex mt-1 rounded-md shadow-sm">
                                            <input :type="show ? 'password' : 'text'" name="newpassword_confirmation"
                                                id="newpassword_confirmation" value="" autocomplete="on" required
                                                class="block w-full p-0 text-gray-900 placeholder-gray-500 border-0 focus:ring-0 sm:text-sm">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 text-sm leading-5 cursor-pointer"
                                                x-on:click="show = !show">

                                                <svg class="h-6 text-gray-700" fill="none"
                                                    :class="{ 'hidden': !show, 'block': show }"
                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                                    <path fill="currentColor"
                                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                    </path>
                                                </svg>

                                                <svg class="h-6 text-gray-700" fill="none"
                                                    :class="{ 'block': !show, 'hidden': show }"
                                                    xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                                    <path fill="currentColor"
                                                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                                    </path>
                                                </svg>

                                            </div>
                                        </div>
                                        @error('newpassword_confirmation')
                                            <div class="mt-1">
                                                <span
                                                    class="flex items-center mt-1 ml-1 text-xs font-medium tracking-wide text-red-500">
                                                    {{ $message }}
                                                </span>
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="pt-5">
                            <div class="flex justify-end" x-data="">
                                <button x-on:click="location.href = '{{ route('web.index') }}'" type="button"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
