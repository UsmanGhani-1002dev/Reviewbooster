@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-12 bg-white p-8 rounded-lg shadow-md">
    <div class="mb-6 flex items-center justify-between flex-wrap gap-4">
        <h2 class="text-3xl font-bold text-gray-800">
            Edit User: <span class="text-blue-600">{{ $user->name }}</span>
        </h2>

        {{-- Subscription Status Badge --}}
        <div>
            @if ($user->subscription)
                <span class="inline-flex items-center px-4 py-1 rounded-full text-sm font-medium border
                    {{ $user->subscription->status === 'active' ? 'bg-green-100 text-green-700 border-green-300' :
                    ($user->subscription->status === 'expired' ? 'bg-red-100 text-red-700 border-red-300' :
                    'bg-yellow-100 text-yellow-700 border-yellow-300') }}">
                    {{ ucfirst($user->subscription->status) }}
                </span>
            @else
                <span class="text-gray-400 italic">No subscription</span>
            @endif
        </div>
    </div>

   <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Company Name</label>
            <input type="text" name="company_name" value="{{ old('company_name', $user->company_name) }}" required
                class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Reset Password</label>
            <input type="password" name="password" placeholder="Leave blank to keep current password"
                class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role"
                class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="bussiness_owner" {{ $user->role === 'bussiness_owner' ? 'selected' : '' }}>Business Owner</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Status</label>
            <select name="is_active"
                class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="1" {{ $user->is_active ? 'selected' : '' }}>Enabled</option>
                <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Disabled</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Plan</label>
            <select name="plan_id"
                class="mt-1 w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 capitalize">   
                <option value="">-- Select Plan --</option>
                @foreach ($plans as $plan)
                    <option value="{{ $plan->id }}"
                        {{ $user->subscription && $user->subscription->plan && $user->subscription->plan->id == $plan->id ? 'selected' : '' }}>
                        {{ $plan->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Total Cards</label>
            <input type="number" value="{{ $user->cards_count ?? 0 }}" readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Subscription Started</label>
            <input type="text"
                value="{{ optional($user->subscription?->started_at)->format('d M Y') ?? 'N/A' }}"
                readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3 text-gray-700" />
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Subscription Ends</label>
            <input type="text"
                value="{{ optional($user->subscription?->ends_at)->format('d M Y') ?? 'N/A' }}"
                readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3 text-gray-700" />
        </div>


        <div class="flex justify-end mt-6 space-x-3">
            <a href="{{ route('admin.users.index') }}"
                class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">Cancel</a>
            <button type="submit"
                class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">Update</button>
        </div>
    </form>
</div>
@endsection
