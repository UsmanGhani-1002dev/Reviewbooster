@extends('layouts.guest')

@section('title', 'Server Error')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-200 to-red-100 px-6">
        <div class="text-center max-w-lg">
            <div class="animate-spin mb-4">
                <svg class="mx-auto w-20 h-20 text-red-500" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 9v2m0 4h.01m8.66-6.93a9.964 9.964 0 00-1.42-1.42M4.93 4.93a9.964 9.964 0 00-1.42 1.42m13.66 11.66a9.964 9.964 0 001.42-1.42m-15.08 0a9.964 9.964 0 001.42 1.42"/>
                </svg>
            </div>
            <h1 class="text-7xl font-extrabold text-red-500 tracking-wide mb-2">500</h1>
            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-4">Internal Server Error</h2>
            <p class="text-gray-600 mb-6 text-base sm:text-lg leading-relaxed">
                Something went wrong on our end.<br>Please try again later.
            </p>
            <a href="{{ url('/') }}"
               class="inline-block px-8 py-3 bg-red-500 text-white text-sm sm:text-base rounded-full shadow-lg hover:bg-red-600 transition duration-300 ease-in-out">
                ← Go to Homepage
            </a>
        </div>
    </div>
@endsection