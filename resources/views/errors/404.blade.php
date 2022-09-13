@extends('templates.error')

@section('title', '404 Not Found')

@section('content')
    <div class="text-center">
        <p class="text-sm font-semibold tracking-wide text-indigo-600 uppercase">404 error</p>
        <h1 class="mt-2 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">Page not found.</h1>
        <p class="mt-2 text-base text-gray-500">Sorry, we couldn’t find the page you’re looking for.</p>
        <div class="mt-6">
            <a href="{{ route('web.index') }}" class="text-base font-medium text-indigo-600 hover:text-indigo-500">Go back
                home<span aria-hidden="true"> &rarr;</span></a>
        </div>
    </div>
@endsection
