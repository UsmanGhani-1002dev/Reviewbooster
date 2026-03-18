@extends('layouts.app')

@section('content')
<style>
    @keyframes floatUp {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-float-up {
        animation: floatUp 0.5s ease-out forwards;
    }
    .animate-float-up-delay-1 {
        animation: floatUp 0.5s ease-out 0.1s forwards;
        opacity: 0;
    }
    .animate-float-up-delay-2 {
        animation: floatUp 0.5s ease-out 0.2s forwards;
        opacity: 0;
    }
    .form-input-premium {
        transition: all 0.3s ease;
    }
    .form-input-premium:focus {
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15);
        border-color: #6366f1;
    }
</style>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
    {{-- Header --}}
    <div class="mb-10 animate-float-up">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-gray-900 to-gray-600 tracking-tight">System Settings</h1>
        <p class="text-gray-500 mt-2 text-lg">Manage API keys, integrations, and core service configurations.</p>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center shadow-sm animate-float-up">
            <div class="flex-shrink-0 w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center mr-4">
                <svg class="w-6 h-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div>
                <h4 class="text-sm font-bold text-emerald-800">Changes Saved Successfully</h4>
                <p class="text-xs text-emerald-600 mt-0.5">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        {{-- Stripe Settings Card --}}
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden animate-float-up-delay-1">
            <div class="bg-gradient-to-r from-indigo-50 to-white px-8 py-6 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200 text-white">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Stripe Configuration</h2>
                        <p class="text-sm text-gray-500">Provide keys to enable subscription payments.</p>
                    </div>
                </div>
                <div class="hidden sm:block">
                    <span class="inline-flex items-center px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-bold rounded-full">Billing</span>
                </div>
            </div>
            
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="stripe_key" class="block text-sm font-bold text-gray-700 mb-2">Publishable Key</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                            </span>
                        </div>
                        <input type="text" name="stripe_key" id="stripe_key" value="{{ $settings['stripe_key'] ?? '' }}" 
                            class="form-input-premium w-full pl-11 pr-4 py-3.5 bg-gray-50/50 hover:bg-white rounded-xl border border-gray-200 text-gray-900 text-sm font-mono outline-none"
                            placeholder="pk_test_...">
                    </div>
                </div>
                
                <div>
                    <label for="stripe_secret" class="block text-sm font-bold text-gray-700 mb-2">Secret Key</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </span>
                        </div>
                        <input type="password" name="stripe_secret" id="stripe_secret" value="{{ $settings['stripe_secret'] ?? '' }}" 
                            class="form-input-premium w-full pl-11 pr-4 py-3.5 bg-gray-50/50 hover:bg-white rounded-xl border border-gray-200 text-gray-900 text-sm font-mono outline-none"
                            placeholder="sk_test_...">
                    </div>
                </div>
            </div>
        </div>

        {{-- Google Places API Card --}}
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden animate-float-up-delay-2">
            <div class="bg-gradient-to-r from-blue-50 to-white px-8 py-6 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-200 text-white">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">Google Places API</h2>
                        <p class="text-sm text-gray-500">Configure connection to Google Maps services.</p>
                    </div>
                </div>
                <div class="hidden sm:block">
                    <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full">Integrations</span>
                </div>
            </div>
            
            <div class="p-8">
                <div class="max-w-2xl">
                    <label for="google_places_api_key" class="block text-sm font-bold text-gray-700 mb-2">API Key</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            </span>
                        </div>
                        <input type="text" name="google_places_api_key" id="google_places_api_key" value="{{ $settings['google_places_api_key'] ?? '' }}" 
                            class="form-input-premium w-full pl-11 pr-4 py-3.5 bg-gray-50/50 hover:bg-white rounded-xl border border-gray-200 text-gray-900 text-sm font-mono outline-none"
                            placeholder="AIza...">
                    </div>
                    <p class="mt-3 text-sm text-gray-500 flex items-start gap-2 bg-gray-50 p-3 rounded-lg border border-gray-100">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Used for business location lookups, matching review places, and fetching photos via the Google Places API. Ensure the key has Places API enabled.</span>
                    </p>
                </div>
            </div>
        </div>

        {{-- Submit Action --}}
        <div class="pt-6 flex justify-end animate-float-up-delay-2">
            <button type="submit" 
                class="group flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-gray-900 to-gray-800 hover:from-black hover:to-gray-900 text-white font-bold rounded-xl focus:ring-4 focus:ring-gray-200 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                </svg>
                <span>Save Configuration</span>
            </button>
        </div>
    </form>
</div>
@endsection
