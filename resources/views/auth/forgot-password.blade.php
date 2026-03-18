@extends('layouts.plain')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl py-10 px-8 text-center">
        
        {{-- Centered Logo --}}
        <div class="flex justify-center mb-6">
            <a href="/" class="flex items-center text-2xl font-semibold text-gray-900">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                ReviewBoost
            </a>
        </div>

        <h2 class="text-xl font-semibold text-gray-900 mb-2">
            Forgot your <span class="text-blue-600 font-bold">password?</span>
        </h2>
        <p class="text-gray-800 mb-6">
            No problem. Enter your email address below and we’ll send you a reset link.
        </p>

        {{-- Session Status --}}
        <x-auth-session-status class="mb-4 text-sm text-green-600" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5 text-left">
            @csrf

            {{-- Email --}}
            <div>
                <x-input-label class="block text-sm font-medium text-gray-700 mb-1" for="email">
                    {{ __('Email Address') }} <span class="text-red-600">*</span>
                </x-input-label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none placeholder-gray-400"
                    placeholder="Enter your email">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full py-2 bg-black text-white rounded-lg font-semibold hover:bg-gray-800 transition">
                Email Password Reset Link
            </button>
        </form>

        {{-- Back to login --}}
        <p class="text-sm text-gray-600 mt-6">
            <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">
                ← Back to login
            </a>
        </p>
    </div>
</div>
@endsection
