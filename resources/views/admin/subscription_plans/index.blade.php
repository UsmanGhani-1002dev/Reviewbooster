@extends('layouts.app')

@section('content')
<div class="p-4 sm:p-6 bg-white rounded-xl shadow-xl">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-indigo-50 rounded-2xl text-indigo-600 shadow-sm border border-indigo-100/50">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900 tracking-tight">Subscription Plans</h2>
                <p class="text-sm font-medium text-gray-400 mt-1">Configure and manage your service tiers</p>
            </div>
        </div>
        
        <a href="{{ route('admin.subscription-plans.create') }}"
           class="inline-flex items-center justify-center bg-indigo-600 text-white px-8 py-3.5 rounded-2xl hover:bg-indigo-700 transition-all duration-300 text-sm font-bold group w-full md:w-auto transform hover:-translate-y-1 active:scale-95">
            <svg class="w-5 h-5 mr-3 transition-transform duration-300 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Create New Plan
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
        {{-- Desktop Table --}}
        <div class="hidden md:block">
            <table class="w-full text-sm text-left text-gray-700 bg-white">
                <thead class="bg-indigo-600 text-white text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Description</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Duration</th>
                        <th class="px-6 py-4">Card Limit</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($plans as $plan)
                        <tr class="hover:bg-indigo-50 transition duration-150 ease-in-out">
                            <td class="px-6 py-4 font-semibold text-gray-800 capitalize">{{ $plan->name }}</td>
                            <td class="px-6 py-4 text-gray-800 capitalize">{!! $plan->description !!}</td>
                            <td class="px-6 py-4 text-gray-700">
                                <span class="font-semibold">£ {{ number_format($plan->price, 2) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-block bg-indigo-100 text-indigo-700 text-xs px-3 py-1 rounded-full">
                                    {{ $plan->duration_days }} days
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm font-semibold px-3 py-1 rounded-full">
                                    {{ $plan->card_limit }} cards
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center gap-3">
                                    <a href="{{ route('admin.subscription-plans.edit', $plan->id) }}"
                                       class="p-2.5 bg-gray-50 text-gray-600 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all border border-transparent hover:border-blue-100 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>

                                    <form method="POST" action="{{ route('admin.subscription-plans.destroy', $plan->id) }}" class="inline delete-plan-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="delete-plan-btn p-2.5 bg-gray-50 text-rose-600 rounded-xl hover:bg-rose-50 transition-all border border-transparent hover:border-rose-100 shadow-sm">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg> 
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-5 text-center text-gray-500 italic">
                                No subscription plans available.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile Card Layout --}}
        <div class="block md:hidden divide-y divide-gray-100">
            @forelse ($plans as $plan)
                <div class="p-6 space-y-4 hover:bg-gray-50 transition-colors">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 capitalize">{{ $plan->name }}</h3>
                            <div class="mt-1 flex items-center gap-2">
                                <span class="text-xl font-black text-indigo-600">£{{ number_format($plan->price, 2) }}</span>
                                <span class="text-xs text-gray-400 font-bold uppercase tracking-widest">/ {{ $plan->duration_days }} Days</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.subscription-plans.edit', $plan->id) }}" class="p-3 bg-blue-50 text-blue-600 rounded-xl active:scale-95 transition-all shadow-sm border border-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form method="POST" action="{{ route('admin.subscription-plans.destroy', $plan->id) }}" class="inline delete-plan-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-plan-btn p-3 bg-rose-50 text-rose-600 rounded-xl active:scale-95 transition-all shadow-sm border border-rose-100">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="bg-gray-50/50 rounded-2xl p-4 border border-gray-100">
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Description</p>
                        <div class="text-sm text-gray-700 leading-relaxed capitalize">
                            {!! $plan->description !!}
                        </div>
                    </div>
                </div>
            @empty
                <div class="p-10 text-center text-gray-500 italic bg-white">
                    No subscription plans available.
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Delete Modal -->
<style>
    @keyframes bounce-modal {
        0%, 100% { transform: translateY(0); }
        25% { transform: translateY(-10px); }
        50% { transform: translateY(5px); }
        75% { transform: translateY(-5px); }
    }
    .animate-bounce-modal {
        animation: bounce-modal 0.5s ease;
    }
</style>
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
    <div id="deleteModalContent" class="bg-white p-6 rounded-xl shadow-lg max-w-md text-center animate-bounce-modal border-t-4 border-red-600 mx-4">
        <div class="flex justify-center mb-4">
            <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a1 1 0 00.86 1.5h18.64a1 1 0 00.86-1.5L13.71 3.86a1 1 0 00-1.72 0z" />
            </svg>
        </div>
        <h3 class="text-xl font-bold text-red-700 mb-2">Are you sure?</h3>
        <p class="text-sm text-red-600">This will permanently delete the selected subscription plan. All users currently on this plan might be affected. This cannot be undone.</p>
        <div class="flex justify-center gap-4 mt-6">
            <button id="confirmDeleteBtn" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-lg font-semibold transition-colors">
                Yes, Delete
            </button>
            <button id="cancelDeleteBtn" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2.5 rounded-lg font-semibold transition-colors">
                Cancel
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let formToSubmit = null;
        const modal = document.getElementById('deleteModal');
        
        // Show modal on delete click
        document.querySelectorAll('.delete-plan-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                formToSubmit = this.closest('form');
                modal.classList.remove('hidden');
            });
        });

        // Confirm delete
        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            if (formToSubmit) formToSubmit.submit();
        });

        // Cancel delete
        document.getElementById('cancelDeleteBtn').addEventListener('click', function() {
            modal.classList.add('hidden');
            formToSubmit = null;
        });
        
        // Close when clicking outside modal
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
                formToSubmit = null;
            }
        });
    });
</script>
@endsection
