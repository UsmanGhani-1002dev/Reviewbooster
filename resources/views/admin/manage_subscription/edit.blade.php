@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-xl shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Edit Subscription</h2>
                <div class="text-sm bg-gray-200 text-gray-700 px-3 py-1 border border-gray-400 rounded-lg font-medium">
                    ID: {{ $subscription->id }}
                </div>
            </div>

            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.subscriptions.update', $subscription->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- User Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">User Name</label>
                        <input type="text" value="{{ $subscription->user->name ?? 'N/A' }}"
                               class="w-full mt-1 px-3 py-2 border rounded text-gray-700 bg-gray-50" readonly />
                    </div>

                    <!-- Plan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Plan</label>
                        <input type="text" value="{{ $subscription->plan->name ?? 'N/A' }}"
                               class="w-full mt-1 px-3 py-2 border rounded text-gray-700 bg-gray-50 capitalize" readonly />
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" value="{{ $subscription->user->email ?? 'N/A' }}" readonly
                               class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-700" />
                    </div>

                    <!-- Company Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Company Name</label>
                        <input type="text" value="{{ $subscription->user->company_name ?? 'N/A' }}" readonly
                               class="w-full mt-1 px-3 py-2 border rounded bg-gray-100 text-gray-700" />
                    </div>

                    <!-- Started At -->
                    <div>
                        <label for="started_at" class="block text-sm font-medium text-gray-700">Started At</label>
                        <input type="date" id="started_at" name="started_at"
                            value="{{ \Carbon\Carbon::parse($subscription->started_at)->format('Y-m-d') }}"
                            class="w-full mt-1 px-3 py-2 border rounded"
                            @if($disableForm) disabled @endif />
                    </div>

                    <!-- Ends At -->
                    <div>
                        <label for="ends_at" class="block text-sm font-medium text-gray-700">Ends At</label>
                        <input type="date" id="ends_at" name="ends_at"
                            value="{{ \Carbon\Carbon::parse($subscription->ends_at)->format('Y-m-d') }}"
                            class="w-full mt-1 px-3 py-2 border rounded"
                            @if($disableForm) disabled @endif />
                    </div>


                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="w-full mt-1 px-3 py-2 border rounded"
                            @if($disableForm || $preventStatusChange) disabled @endif>
                            <option value="active" {{ $subscription->status === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="expired" {{ $subscription->status === 'expired' ? 'selected' : '' }}>Expired</option>
                            <option value="cancelled" {{ $subscription->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                </div>

                <div class="flex justify-end mt-6">
                    <a href="{{ route('admin.manage-subscription.index') }}"
                       class="inline-block mr-3 px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Update Subscription
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
