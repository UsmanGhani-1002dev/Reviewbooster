@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto my-12 bg-white p-8 rounded-lg shadow-md">

    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-6 flex items-center justify-between flex-wrap gap-4">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ $contacts->first_name }} {{ $contacts->last_name }} ({{ $contacts->subject }})
        </h2>

        {{-- Subscription Status Badge --}}
        <div class="bg-gray-200 p-2 rounded-lg">
            Submission ID: <span class="text-blue-600">{{ $contacts->id }}</span>
        </div>
    </div>

    {{-- Contact Status Update Form --}}
    <form method="POST" action="{{ route('admin.contact-submissions.update', $contacts->id) }}" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="full_name"
                value="{{ old('full_name', trim(($contacts->first_name ?? '') . ' ' . ($contacts->last_name ?? '')) ?: 'N/A') }}"
                readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="text" name="email" value="{{ old('email', $contacts->email ?? 'N/A') }}" readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $contacts->phone ?? '-') }}" readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Business Name</label>
            <input type="text" name="legal_business_name" value="{{ old('business_name', $contacts->business_name ?? '-') }}" readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Inquiry Type</label>
            <input type="text" name="inquiry_type" value="{{ old('inquiry_type', $contacts->inquiry_type) }}" readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3 capitalize" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Subject</label>
            <input type="text" name="subject" value="{{ old('subject', $contacts->subject) }}" readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3 capitalize" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Message</label>
            <textarea name="message" readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3 capitalize"
                rows="5">{{ old('message', $contacts->message) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">IP Address</label>
            <input type="text" name="ip_address" value="{{ old('ip_address', $contacts->ip_address ?? '-') }}" readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3 capitalize" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status"
                    class="mt-1 w-full border border-gray-300 bg-white rounded-lg p-3">
                <option value="new" {{ $contacts->status === 'new' ? 'selected' : '' }}>New</option>
                <option value="in_progress" {{ $contacts->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="resolved" {{ $contacts->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Subscription Started</label>
            <input type="text"
                value="{{ optional($contacts->created_at)->format('d F Y') ?? 'N/A' }}"
                readonly
                class="mt-1 w-full border border-gray-300 bg-gray-100 rounded-lg p-3 text-gray-700" />
        </div>

        {{-- Update & Cancel --}}
        <div class="flex flex-row justify-end items-center mt-6 pt-4 gap-3">
            <a href="{{ route('admin.contact-submissions.index') }}"
                class="w-1/2 md:w-auto px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition text-center">
                Cancel
            </a>
            <button type="submit"
                class="w-1/2 md:w-auto px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition text-center">
                Update
            </button>
        </div>
    </form>

    {{-- Delete Button (Separate Form) --}}
    <div class="md:-mt-[40px] mt-5">
        <form method="POST" action="{{ route('admin.contact-submissions.destroy', $contacts->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit"
                onclick="return confirm('Are you sure you want to delete this business?')"
                class="px-5 w-full md:w-auto py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                Delete Business
            </button>
        </form>
    </div>
</div>
@endsection
