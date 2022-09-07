@extends('templates.error')

@section('title', '404 Not Found')

@section('content')
    <main class="flex flex-col justify-center flex-grow w-full px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-center flex-shrink-0">
            <a href="{{ route('web.index') }}" class="inline-flex">
                <span class="sr-only">Workflow</span>
                <img class="w-auto h-12" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600"
                    alt="">
            </a>
        </div>
        <div class="py-16">
            <div class="text-center">
                <p class="text-sm font-semibold tracking-wide text-indigo-600 uppercase">404 error</p>
                <h1 class="mt-2 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">Page not found.</h1>
                <p class="mt-2 text-base text-gray-500">Sorry, we couldn’t find the page you’re looking for.</p>
                <div class="mt-6">
                    <a href="{{ route('web.index') }}"
                        class="text-base font-medium text-indigo-600 hover:text-indigo-500">Go back
                        home<span aria-hidden="true"> &rarr;</span></a>
                </div>
            </div>
        </div>
    </main>
@endsection
