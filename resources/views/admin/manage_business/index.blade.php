@extends('layouts.app')

@section('full_content')

    <div class="mx-auto p-4 sm:p-6">
        <div class="bg-white rounded-2xl shadow-xl p-4 sm:p-8 border border-gray-100">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-10 gap-6">
                <!-- Heading Block -->
                <div class="w-full md:w-auto">
                    <div class="flex items-center gap-4 mb-3">
                        <div class="p-2 sm:p-3 bg-indigo-50 rounded-2xl text-indigo-600 shadow-sm border border-indigo-100/50 shrink-0">
                            <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight whitespace-nowrap">
                            Manage Business & Cards
                        </h2>
                        <p class="text-sm font-medium text-gray-400">Directory of all registered business entities</p>
                        </div>
                    </div>
                    
                    
                    {{-- Mobile Only Button (Below Description) --}}
                    <a href="{{ route('admin.manage_business.create') }}" class="md:hidden mt-5 inline-flex items-center px-6 py-3.5 bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all text-sm w-full justify-center active:scale-95">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Create Business
                    </a>
                </div>

                {{-- Desktop Only Button & Search Group --}}
                <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto">
                    <a href="{{ route('admin.manage_business.create') }}" class="hidden md:inline-flex items-center px-6 py-2.5 bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all transform hover:-translate-y-1 active:scale-95 text-sm">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Create Business
                    </a>

                <!-- Search Bar -->
                 <form method="GET" action="{{ route('admin.manage_business.index') }}" class="w-full md:w-80">
                    <label for="search" class="sr-only">Search Business</label>
                    <div class="relative text-gray-400 focus-within:text-black">
                    <input
                        id="search"
                        type="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search name, email, company..."
                        class="block w-full rounded-xl border border-gray-300 bg-white py-3 pl-10 pr-4 text-sm placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 focus:outline-none transition-all"
                    />
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1111 3a7.5 7.5 0 015.65 13.65z"></path>
                        </svg>
                    </div>
                    </div>
                </form>
            </div>
        </div>
            
            @if (session('success'))
                <div class="mb-6 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200 shadow-sm flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <div class="overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                {{-- Desktop Table --}}
                <div class="hidden lg:block">
                    <table class="min-w-full text-sm text-left text-gray-700 bg-white">
                        <thead class="bg-indigo-600 text-white uppercase tracking-wider text-xs">
                            <tr>
                                <th class="px-6 py-4">ID</th>
                                <th class="px-6 py-4">User</th>
                                <th class="px-6 py-4">Business Name</th>
                                <th class="px-6 py-4">Legal Name</th>
                                <th class="px-6 py-4 text-center">Cards</th>
                                <th class="px-6 py-4">Created At</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($businesses as $business)
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                    <td class="px-6 py-4 font-mono text-gray-400">{{ $business->id }}</td>
                                    <td class="px-6 py-4 font-bold text-gray-900">{{ $business->user->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 font-bold text-gray-800 capitalize" title="{{ $business->business_name }}">
                                        {{ \Illuminate\Support\Str::limit($business->business_name ?? 'N/A', 40) }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 font-medium">{{ $business->legal_business_name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100">
                                            {{ $business->cards_count }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 font-medium">{{ \Carbon\Carbon::parse($business->created_at)->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        @if($business->status == 'active')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-100 uppercase tracking-tight">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-2 animate-pulse"></span>    
                                                Active
                                            </span>
                                        @elseif($business->status == 'blocked')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-rose-50 text-rose-600 border border-rose-100 uppercase tracking-tight">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500 mr-2"></span>    
                                                Blocked
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-slate-50 text-slate-600 border border-slate-100 uppercase tracking-tight">
                                                {{ ucfirst($business->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('admin.manage_business.view',$business->id) }}"
                                            class="p-2.5 bg-gray-50 text-gray-600 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all border border-transparent hover:border-blue-100 shadow-sm" title="Settings">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </a>
                                            <form method="POST" action="{{ route('admin.manage_business.delete', $business->id) }}" class="inline delete-business-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="delete-business-btn p-2.5 bg-gray-50 text-rose-600 rounded-xl hover:bg-rose-50 transition-all border border-transparent hover:border-rose-100 shadow-sm" title="Delete">
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
                                    <td colspan="8" class="px-6 py-10 text-center text-gray-500 italic">No business entities found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Mobile Card List --}}
                <div class="block lg:hidden divide-y divide-gray-100">
                    @forelse ($businesses as $business)
                        <div class="p-6 space-y-4 hover:bg-gray-50 transition-colors">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-base font-bold text-gray-900 leading-tight capitalize" title="{{ $business->business_name }}">
                                        {{ \Illuminate\Support\Str::limit($business->business_name ?? 'N/A', 25) }}
                                    </h3>
                                    <p class="text-sm text-gray-500 font-medium leading-relaxed">{{ $business->legal_business_name ?? 'N/A' }}</p>
                                </div>
                                <div class="text-right shrink-0">
                                    @if($business->status == 'active')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-100 uppercase tracking-tight">Active</span>
                                    @elseif($business->status == 'blocked')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-600 border border-rose-100 uppercase tracking-tight">Blocked</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-50 text-slate-600 border border-slate-100 uppercase tracking-tight">{{ ucfirst($business->status) }}</span>
                                    @endif
                                    <div class="mt-2 text-[10px] font-mono text-gray-400">ID #{{ $business->id }}</div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 bg-gray-50/50 rounded-2xl p-4 border border-gray-100">
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Owner</p>
                                    <p class="text-sm font-bold text-gray-900 truncate">{{ $business->user->name ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Cards</p>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-100">{{ $business->cards_count }} Units</span>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Registration Date</p>
                                    <p class="text-xs font-medium text-gray-600">{{ \Carbon\Carbon::parse($business->created_at)->format('d M Y') }}</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-end gap-2 pt-2">
                                <a href="{{ route('admin.manage_business.view',$business->id) }}" 
                                   class="p-3 bg-blue-50 text-blue-600 rounded-xl font-bold text-sm active:scale-95 transition-all border border-blue-100 shadow-sm">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('admin.manage_business.delete', $business->id) }}" class="inline delete-business-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="delete-business-btn p-2.5 bg-rose-50 text-rose-600 rounded-xl active:scale-95 transition-all border border-rose-100 shadow-sm" title="Delete">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="p-10 text-center text-gray-500 italic">No business entities found.</div>
                    @endforelse
                </div>
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
            <p class="text-sm text-red-600">This action will delete the business and all associated cards and data. This is permanent and cannot be undone.</p>
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
            document.querySelectorAll('.delete-business-btn').forEach(button => {
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
