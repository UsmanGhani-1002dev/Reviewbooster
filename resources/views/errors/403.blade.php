@extends('layouts.guest')

@section('title', 'Access Denied')

@section('content')
    <div class="flex items-center justify-center bg-gradient-to-br from-red-100 to-red-200 px-6 py-32">
        <div class="text-center max-w-lg">
            <div class="animate-pulse mb-4">
                <svg class="mx-auto w-20 h-20 text-red-600" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v2m0 4h.01M4.928 4.928a10 10 0 0114.142 14.142A10 10 0 014.928 4.928z"/>
                </svg>
            </div>
            <h1 class="text-7xl font-extrabold text-red-600 tracking-wide mb-2">403</h1>
            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-4">Access Denied</h2>
            <p class="text-gray-600 mb-6 text-base sm:text-lg leading-relaxed">
                You don’t have permission to view this page.
            </p>
            <a href="{{ url('/') }}"
               class="inline-block px-8 py-3 bg-red-600 text-white text-sm sm:text-base rounded-full shadow-lg hover:bg-red-700 transition duration-300 ease-in-out">
                ← Return Home
            </a>
        </div>
    </div>
@endsection