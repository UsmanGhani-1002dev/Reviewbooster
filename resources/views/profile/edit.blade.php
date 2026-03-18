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
    .animate-float-up-delay-3 {
        animation: floatUp 0.5s ease-out 0.3s forwards;
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

<div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8 sm:py-12">
    {{-- Header --}}
    <div class="mb-10 animate-float-up">
        <h1 class="text-3xl sm:text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-gray-900 to-gray-600 tracking-tight">Account Profile</h1>
        <p class="text-gray-500 mt-2 text-lg">Manage your personal information, security settings, and subscription.</p>
    </div>

    <div class="space-y-8">
        {{-- Profile Information --}}
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden animate-float-up">
            <div class="p-8">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Update Password --}}
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden animate-float-up-delay-1">
            <div class="p-8">
                @include('profile.partials.update-password-form')
            </div>
        </div>
        
        {{-- Subscription Details --}}
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-gray-100 overflow-hidden animate-float-up-delay-2">
            @include('profile.partials.subscription')
        </div>

        {{-- Delete Account --}}
        <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/40 border border-rose-100 overflow-hidden animate-float-up-delay-3 relative">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-rose-500 to-red-600"></div>
            <div class="p-8">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>

<!-- Global Account Deletion Modal (Outside of overflow-hidden containers) -->
<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
        @csrf
        @method('delete')

        <div class="flex items-center gap-4 mb-4">
            <div class="w-12 h-12 rounded-full bg-rose-100 flex items-center justify-center shrink-0">
                <i data-lucide="triangle-alert" class="w-6 h-6 text-rose-600"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-900">
                {{ __('Delete Account') }}
            </h2>
        </div>

        <p class="mt-2 text-sm text-gray-600 mb-6 bg-red-50 p-4 rounded-xl border border-red-100">
            <strong>Warning:</strong> {{ __('This action cannot be undone. All your details, cards, reviews, and active subscriptions will be permanently erased. Please enter your password to confirm.') }}
        </p>

        <div>
            <label for="password" class="block text-sm font-bold text-gray-700 mb-2">{{ __('Enter Password') }}</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                    <i data-lucide="lock" class="w-5 h-5 text-gray-400"></i>
                </div>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-input-premium w-full pl-11 pr-4 py-3 bg-gray-50/50 focus:bg-white rounded-xl border border-gray-200 outline-none text-sm transition-all"
                    placeholder="{{ __('Password') }}"
                />
            </div>
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-8 flex justify-end gap-3 pt-4 border-t border-gray-100">
            <button type="button" x-on:click="$dispatch('close')" class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold rounded-xl transition-all">
                {{ __('Cancel') }}
            </button>

            <button type="submit" class="px-6 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-rose-200 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                {{ __('Confirm Deletion') }}
            </button>
        </div>
    </form>
</x-modal>

@push('scripts')
<script>
    // Include Alpine for the success messages and modals if it isn't globally included
    if (typeof Alpine === 'undefined') {
        let script = document.createElement('script');
        script.src = "//unpkg.com/alpinejs";
        script.defer = true;
        document.head.appendChild(script);
    }
</script>
@endpush
@endsection
