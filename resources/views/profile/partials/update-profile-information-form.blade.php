<section>
    <div class="flex items-start gap-4 mb-8">
        <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center shrink-0 border border-indigo-100">
            <i data-lucide="user" class="w-6 h-6 text-indigo-600 stroke-[2]"></i>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-900">
                {{ __('Profile Information') }}
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                {{ __("Update your account's profile information and email address.") }}
            </p>
        </div>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6 max-w-2xl">
        @csrf
        @method('patch')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">{{ __('Full Name') }}</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                        <i data-lucide="user" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input id="name" name="name" type="text" class="form-input-premium w-full pl-11 pr-4 py-3 bg-gray-50/50 hover:bg-white rounded-xl border border-gray-200 text-gray-900 text-sm outline-none" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <label for="company_name" class="block text-sm font-bold text-gray-700 mb-2">{{ __('Company Name') }}</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                        <i data-lucide="building" class="w-5 h-5 text-gray-400"></i>
                    </div>
                    <input id="company_name" name="company_name" type="text" class="form-input-premium w-full pl-11 pr-4 py-3 bg-gray-50/50 hover:bg-white rounded-xl border border-gray-200 text-gray-900 text-sm outline-none" value="{{ old('company_name', $user->company_name) }}" required autocomplete="company_name" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
            </div>
        </div>

        <div>
            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">{{ __('Email Address') }}</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                    <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>
                </div>
                <input id="email" name="email" type="email" class="form-input-premium w-full pl-11 pr-4 py-3 bg-gray-50/50 hover:bg-white rounded-xl border border-gray-200 text-gray-900 text-sm outline-none" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-4 bg-amber-50 rounded-xl border border-amber-100 flex items-start gap-3">
                    <svg class="w-5 h-5 text-amber-500 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <div>
                        <p class="text-sm text-amber-800 font-medium">
                            {{ __('Your email address is unverified.') }}
                        </p>
                        <button form="send-verification" class="text-sm text-indigo-600 hover:text-indigo-800 font-bold hover:underline mt-1 transition-colors">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </div>
                </div>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-emerald-600 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <div class="pt-4 flex items-center gap-4">
            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 transition-all hover:-translate-y-0.5 active:scale-95 flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" class="text-sm font-bold text-emerald-600 flex items-center bg-emerald-50 px-3 py-1.5 rounded-lg">
                    <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    {{ __('Saved successfully.') }}
                </p>
            @endif
        </div>
    </form>
</section>
