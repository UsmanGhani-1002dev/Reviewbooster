<section class="max-w-2xl px-2 py-8">
    <div class="flex items-start gap-4 mb-8">
        <div class="w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center shrink-0 border border-rose-100 relative z-10">
            <svg class="w-6 h-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </div>
        <div class="relative z-10">
            <h2 class="text-xl font-bold text-gray-900">
                {{ __('Danger Zone') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600 font-medium">
                {{ __('Once your account is deleted, all resources and data will be permanently wiped.') }}
            </p>
        </div>
    </div>

    <!-- Delete Account Button -->
    <div class="relative z-10">
        <button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-8 py-3 bg-white border-2 border-rose-200 hover:border-rose-600 text-rose-600 hover:bg-rose-50 font-bold rounded-xl transition-all shadow-sm hover:shadow-md active:scale-95 flex items-center group"
        >
            <i data-lucide="user-minus" class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform"></i>
            {{ __('Delete Account') }}
        </button>
    </div>

</section>
