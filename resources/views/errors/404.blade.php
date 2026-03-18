@extends('layouts.guest')

@section('title', 'Page Not Found')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-100 to-blue-100 px-6">
        <div class="text-center max-w-xl">
            <div class="animate-bounce mb-4">
                <svg class="mx-auto w-20 h-20 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.054 0 1.918-.816 1.994-1.851L21 17V7c0-1.054-.816-1.918-1.851-1.994L19 5H5c-1.054 0-1.918.816-1.994 1.851L3 7v10c0 1.054.816 1.918 1.851 1.994L5 19z"/>
                </svg>
            </div>
            <h1 class="text-7xl font-extrabold text-blue-600 tracking-wide mb-2">404</h1>
            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-4">Page Not Found</h2>
            <p class="text-gray-600 mb-6 text-base sm:text-lg leading-relaxed">
                Sorry, the page you are looking for doesn’t exist, has been moved,<br>
                or is temporarily unavailable.
            </p>
            <a href="{{ url('/') }}"
               class="inline-block px-8 py-3 bg-blue-600 text-white text-sm sm:text-base rounded-full shadow-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                ← Back to Homepage
            </a>
        </div>
    </div>
@endsection