@extends('templates.app')

@section('title', 'Dashboard')

@section('content')
    <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
    </div>
    <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
        @if ($errors->has('errorMessage'))
            <div class="py-4">
                <x-alert-danger>
                    <x-slot:title>{{ $errors->default->first('errorMessage') ?? null }}</x-slot:title>
                    <x-slot:description>{{ $errors->default->first('errorDescription') ?? null }}</x-slot:description>
                </x-alert-danger>
            </div>
        @endif
        @if (session('successMessage'))
            <div class="py-4">
                <x-alert-success>
                    <x-slot:title>{{ session('successMessage') ?? null }}</x-slot:title>
                    <x-slot:description>{{ session('successDescription') ?? null }}</x-slot:description>
                </x-alert-success>
            </div>
        @endif
        <!-- Replace with your content -->
        <div class="py-4">
            <div class="border-4 border-gray-200 border-dashed rounded-lg h-96"></div>
        </div>
        <!-- /End replace -->
    </div>
@endsection
