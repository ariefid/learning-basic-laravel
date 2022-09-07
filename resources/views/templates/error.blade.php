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
        @yield('content', null)
    </div>
    @vite(['resources/js/app.js'])
</body>

</html>
