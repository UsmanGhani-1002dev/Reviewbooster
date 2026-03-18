<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://js.stripe.com/v3/"></script>

<section x-data="{ showModal: false }" class="max-w-4xl px-8 py-8 w-full">
    @if(Auth::user()->role !== 'admin')
        <div class="flex items-start gap-4 mb-8 border-b border-gray-100 pb-6 w-full">
            <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center shrink-0 border border-emerald-100">
                <svg class="w-6 h-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-900">
                    {{ __('Subscription Plan') }}
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    {{ __('View details about your active review booster subscription.') }}
                </p>
            </div>
        </div>

        @if ($subscription && $subscription->plan)
            @php
                $isExpired = $subscription->ends_at && \Carbon\Carbon::parse($subscription->ends_at)->isPast();
            @endphp
            <!-- Beautiful Card Redesign -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Left: Hero Plan Highlight -->
                <div class="col-span-1 bg-gradient-to-br {{ $isExpired ? 'from-rose-600 to-red-700' : 'from-indigo-600 to-purple-700 shadow-indigo-200' }} rounded-3xl p-6 text-white shadow-xl relative overflow-hidden transition-all duration-500">
                    <!-- Decorative element -->
                    <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-black/10 rounded-full blur-2xl"></div>

                    <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-widest bg-white/20 backdrop-blur-md mb-4 border border-white/20">
                                {{ $isExpired ? __('Expired Plan') : __('Active Plan') }}
                            </span>
                            <h3 class="text-3xl font-black capitalize mb-1">{{ $subscription->plan->name }}</h3>
                            <p class="{{ $isExpired ? 'text-rose-100' : 'text-indigo-100' }} text-sm font-medium">{{ $subscription->plan->duration_days }} Days Access</p>
                        </div>

                        <div class="mt-8">
                            <div class="text-4xl font-extrabold flex items-baseline gap-1">
                                <span class="text-xl">€</span>{{ number_format($subscription->plan->price, 2) }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Details Breakdown -->
                <div class="col-span-1 md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-2xl p-5 border border-gray-100">
                        <div class="flex items-center gap-2 text-gray-400 mb-2">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <span class="text-xs font-bold uppercase tracking-widest">Started At</span>
                        </div>
                        <p class="text-lg font-bold text-gray-900">{{ \Carbon\Carbon::parse($subscription->started_at)->format('d M Y') }}</p>
                    </div>

                    <div class="{{ $isExpired ? 'bg-rose-50/50 border-rose-100' : 'bg-gray-50 border-gray-100' }} rounded-2xl p-5 border">
                        <div class="flex items-center gap-2 {{ $isExpired ? 'text-rose-400' : 'text-gray-400' }} mb-2">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-xs font-bold uppercase tracking-widest">Ends At</span>
                        </div>
                        <p class="text-lg font-bold {{ $isExpired ? 'text-rose-600' : 'text-gray-900' }}">
                            {{ $subscription->ends_at ? \Carbon\Carbon::parse($subscription->ends_at)->format('d M Y') : 'N/A' }}
                        </p>
                    </div>

                    <div class="sm:col-span-2 bg-indigo-50/50 rounded-2xl p-5 border border-indigo-50">
                        <div class="flex items-center gap-2 text-indigo-400 mb-2">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="text-xs font-bold uppercase tracking-widest text-indigo-600">Plan Description</span>
                        </div>
                        <div class="text-sm font-medium text-gray-600 prose prose-sm prose-indigo leading-relaxed capitalize">
                            {!! $subscription->plan->description !!}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- No Subscription State -->
            <div class="text-center py-12 px-4 bg-gray-50 rounded-3xl border border-gray-100 border-dashed">
                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm border border-gray-200">
                    <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4m8-8v16"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">No Active Subscription</h3>
                <p class="text-gray-500 mb-6 text-sm max-w-sm mx-auto">You currently don't have an active subscription plan. Upgrade to unlock premium features and grow your reviews faster.</p>
                
                <a href="{{ route('user.subscription.index') }}" class="inline-flex items-center justify-center px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition-all shadow-lg shadow-indigo-200 hover:-translate-y-0.5 active:scale-95">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    View Plans
                </a>
            </div>
        @endif
    @else
        <div class="bg-indigo-50/50 rounded-3xl p-8 border border-indigo-100 flex flex-col md:flex-row items-center gap-6">
            <div class="w-16 h-16 bg-white rounded-2xl shadow-sm flex items-center justify-center shrink-0 border border-indigo-50">
                <svg class="w-8 h-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-1">Administrator Account</h3>
                <p class="text-gray-500 leading-relaxed">
                    You are logged in as a system administrator. Subscription plans and payments are managed through the 
                    <a href="{{ route('admin.manage-subscription.index') }}" class="text-indigo-600 font-bold hover:underline">Manage Subscription</a> dashboard.
                </p>
            </div>
        </div>
    @endif
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</section>
