<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', null) @hasSection('title')
            -
        @endif Learning Basic Laravel</title>

    @vite(['resources/css/app.css'])
</head>

<body class="h-full">
    <div class="flex flex-col justify-center min-h-full pt-16 pb-12 bg-white">
        <main class="flex flex-col justify-center flex-grow w-full px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-center flex-shrink-0">
                <a href="{{ route('web.index') }}" class="inline-flex">
                    <span class="sr-only">TailwindUI</span>
                    <img class="w-auto h-12"
                        src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                        alt="TailwindUI">
                </a>
            </div>
            <div class="py-16">
                @yield('content', null)
            </div>
        </main>
    </div>
    @vite(['resources/js/app.js'])
</body>

</html>
