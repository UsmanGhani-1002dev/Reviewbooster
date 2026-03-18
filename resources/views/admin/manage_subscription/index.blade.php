@extends('layouts.app')

@section('full_content')

    <div class="mx-auto p-4 sm:p-6">
        <div class="bg-white rounded-2xl shadow-xl p-4 sm:p-8 border border-gray-100">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8 gap-6">
                <!-- Heading -->
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-indigo-50 rounded-2xl text-indigo-600 shadow-sm border border-indigo-100/50">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">
                            Manage Subscriptions
                        </h2>
                        <p class="text-sm font-medium text-gray-400 mt-1">Monitor and modify user subscription cycles</p>
                    </div>
                </div>

                <!-- Search Bar -->
                 <form method="GET" action="{{ route('admin.manage-subscription.index') }}" class="w-full md:w-80">
                    <label for="search" class="sr-only">Search subscriptions</label>
                    <div class="relative text-gray-400 focus-within:text-black">
                    <input
                        id="search"
                        type="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search user, email, company..."
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
            
            @if (session('success'))
                <div class="mb-4 p-4 rounded-xl bg-green-50 text-green-700 border border-green-200 shadow-sm flex items-center gap-3">
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
                                <th class="px-6 py-4">Plan</th>
                                <th class="px-6 py-4">Company</th>
                                <th class="px-6 py-4">Started At</th>
                                <th class="px-6 py-4">Ends At</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($subscriptions as $subscription)
                                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                    <td class="px-6 py-4 font-mono text-gray-400">{{ $subscription->id }}</td>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 font-bold border border-blue-100 shrink-0">
                                                {{ strtoupper(substr($subscription->user->name, 0, 1)) }}
                                            </div>
                                            <div class="min-w-0">
                                                <div class="text-sm font-bold text-gray-900 truncate text-left">{{ $subscription->user->name }}</div>
                                                <div class="text-xs text-gray-500 truncate">{{ $subscription->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-indigo-600 font-bold capitalize">{{ $subscription->plan->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $subscription->user->business_name ?? $subscription->user->company_name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 text-gray-600 font-medium">{{ \Carbon\Carbon::parse($subscription->started_at)->format('d M Y') }}</td>
                                    <td class="px-6 py-4 text-gray-600 font-medium">{{ \Carbon\Carbon::parse($subscription->ends_at)->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold border
                                            {{ $subscription->status === 'active' ? 'bg-green-100 text-green-700 border-green-300' :
                                            ($subscription->status === 'expired' ? 'bg-red-100 text-red-700 border-red-300' :
                                            'bg-yellow-100 text-yellow-700 border-yellow-300') }}">
                                            
                                            <span class="w-1.5 h-1.5 rounded-full mr-2 animate-pulse
                                                {{ $subscription->status === 'active' ? 'bg-green-500' :
                                                ($subscription->status === 'expired' ? 'bg-red-500' :
                                                'bg-yellow-500') }}">
                                            </span>
                                            
                                            {{ ucfirst($subscription->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('admin.subscriptions.edit', $subscription->id) }}"
                                           class="p-2.5 bg-gray-50 text-gray-600 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all border border-transparent hover:border-blue-100 shadow-sm inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-10 text-center text-gray-500 italic">No subscriptions found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Mobile Card List --}}
                <div class="block lg:hidden divide-y divide-gray-100">
                    @forelse ($subscriptions as $subscription)
                        <div class="p-6 space-y-4 hover:bg-gray-50 transition-colors">
                            <div class="flex justify-between items-start">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 font-bold border border-blue-100 shrink-0">
                                        {{ strtoupper(substr($subscription->user->name, 0, 1)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <div class="text-base font-bold text-gray-900 text-left">{{ $subscription->user->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $subscription->user->email }}</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border
                                        {{ $subscription->status === 'active' ? 'bg-green-50 text-green-700 border-green-200' :
                                        ($subscription->status === 'expired' ? 'bg-red-50 text-red-700 border-red-200' :
                                        'bg-yellow-50 text-yellow-700 border-yellow-200') }}">
                                        {{ ucfirst($subscription->status) }}
                                    </span>
                                    <div class="mt-2 text-[10px] font-mono text-gray-400">ID #{{ $subscription->id }}</div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 bg-gray-50/50 rounded-2xl p-4 border border-gray-100">
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Plan</p>
                                    <p class="text-sm font-bold text-indigo-600 capitalize">{{ $subscription->plan->name ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Company</p>
                                    <p class="text-sm font-medium text-gray-700 truncate capitalize">{{ $subscription->user->business_name ?? $subscription->user->company_name ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Started</p>
                                    <p class="text-xs font-bold text-gray-600">{{ \Carbon\Carbon::parse($subscription->started_at)->format('d M Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Ends</p>
                                    <p class="text-xs font-bold text-gray-600">{{ \Carbon\Carbon::parse($subscription->ends_at)->format('d M Y') }}</p>
                                </div>
                            </div>

                            <div class="flex items-center justify-end pt-2">
                                <a href="{{ route('admin.subscriptions.edit', $subscription->id) }}" 
                                   class="flex items-center gap-2 px-4 py-2.5 bg-blue-50 text-blue-600 rounded-xl font-bold text-sm active:scale-95 transition-all border border-blue-100 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="p-10 text-center text-gray-500 italic">No subscriptions found.</div>
                    @endforelse
                </div>
            </div>

            @if ($subscriptions instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="mt-8">
                    {{ $subscriptions->appends(['search' => request('search')])->links('pagination::tailwind') }}
                </div>
            @endif
        </div>
    </div>
@endsection
