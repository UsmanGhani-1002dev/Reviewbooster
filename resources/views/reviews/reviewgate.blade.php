@extends('layouts.plain')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<style>
    .star-glow {
        filter: drop-shadow(0 0 4px rgba(250, 204, 21, 0.5));
    }
    @keyframes floatUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-float-up {
        animation: floatUp 0.6s ease-out forwards;
    }
</style>

<div class="max-w-2xl w-full mx-auto bg-white rounded-2xl shadow-xl overflow-hidden mt-10 animate-float-up">
    <!-- Header -->
    <div class="relative bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 px-6 py-10 text-center overflow-hidden">
        {{-- Decorative elements --}}
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute -top-10 -left-10 w-40 h-40 bg-white/5 rounded-full"></div>
            <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-white/5 rounded-full"></div>
            <div class="absolute top-1/2 left-1/4 w-2 h-2 bg-white/20 rounded-full"></div>
            <div class="absolute top-1/3 right-1/4 w-1.5 h-1.5 bg-white/15 rounded-full"></div>
        </div>

        <div class="relative z-10">
            {{-- Business icon/photo --}}
            @if (!empty($businessPhoto))
                <div class="w-20 h-20 rounded-2xl mx-auto mb-4 border-2 border-white/30 shadow-lg overflow-hidden">
                    <img src="{{ $businessPhoto }}" alt="{{ $googleBusinessName ?? $card->name }}" class="w-full h-full object-cover">
                </div>
            @else
                <div class="w-16 h-16 bg-white/15 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/20">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.15c0 .415.336.75.75.75z"/></svg>
                </div>
            @endif

            {{-- Business name --}}
            <h1 class="text-3xl sm:text-4xl font-bold text-white mb-3">{{ $googleBusinessName ?? $card->name }}</h1>

            {{-- Rating --}}
            <div class="inline-flex items-center gap-2.5 bg-white/15 backdrop-blur-sm px-4 py-2 rounded-full border border-white/20">
                <span class="text-lg font-bold text-white">{{ $rating ? number_format($rating, 1) : '0.0' }}</span>
                <div class="flex gap-0.5 star-glow">
                    @php
                        $fullStars = floor($rating ?? 0);
                        $halfStar = ($rating - $fullStars) >= 0.5 ? true : false;
                        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                    @endphp

                    @for ($i = 0; $i < $fullStars; $i++)
                        <i class="fas fa-star text-yellow-300 text-sm"></i>
                    @endfor

                    @if ($halfStar)
                        <i class="fas fa-star-half-alt text-yellow-300 text-sm"></i>
                    @endif

                    @for ($i = 0; $i < $emptyStars; $i++)
                        <i class="far fa-star text-yellow-300/50 text-sm"></i>
                    @endfor
                </div>
                <span class="text-white/80 text-sm">{{ $reviewCount ? $reviewCount . ' Reviews' : 'No Reviews' }}</span>
            </div>
        </div>
    </div>


    <!-- Feedback Prompt -->
    <div class="p-8 text-center">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">How was your recent experience?</h2>
        <p class="text-gray-500 mb-8">
            Thanks for choosing us! Would you please take a moment to rate
            your experience? Your feedback is highly appreciated, and your
            response will help us serve you even better in the future.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 px-4">
            <!-- Good Experience -->
            <button id="good-feedback-btn" onclick="showLoadingSpinner('good')" 
                class="group flex flex-col items-center p-6 bg-gray-50 hover:bg-green-50 border border-gray-200 rounded-xl shadow-sm transition transform hover:-translate-y-1">
                <div class="text-green-500 group-hover:scale-110 transition duration-300 mb-3">
                    <i class="fas fa-thumbs-up fa-4x"></i>
                </div>
                <span class="text-lg font-medium text-gray-700 group-hover:text-green-600">I had a good experience</span>
            </button>

            <!-- Bad Experience -->
            <button id="bad-feedback-btn" onclick="showLoadingSpinner('bad')" 
                class="group flex flex-col items-center p-6 bg-gray-50 hover:bg-red-50 border border-gray-200 rounded-xl shadow-sm transition transform hover:-translate-y-1">
                <div class="text-red-500 group-hover:scale-110 transition duration-300 mb-3">
                    <i class="fas fa-thumbs-down fa-4x"></i>
                </div>
                <span class="text-lg font-medium text-gray-700 group-hover:text-red-600">I had a bad experience</span>
            </button>
        </div>
    </div>

    <!-- Loading Spinner -->
    <div id="loading-spinner" class="hidden fixed top-0 left-0 w-full h-full bg-opacity-50 bg-gray-900 flex justify-center items-center z-50">
        <div class="animate-spin border-t-4 border-b-4 border-blue-500 w-16 h-16 rounded-full"></div>
    </div>
</div>

<script>
     function showLoadingSpinner(type) {
        document.getElementById('loading-spinner').classList.remove('hidden');

        setTimeout(function() {
            if (type === 'good') {
                // Open the Google review link of this card
                window.location.href = "{{ route('reviews.track', ['token' => $card->token]) }}";
            } else {
                // Open your internal feedback route
               window.location.href = "{{ route('reviews.feedback.general', ['token' => $card->token]) }}";
            }
        }, 1500);
    }

    // Hide spinner if coming back to this page via browser back button
    window.addEventListener('pageshow', function () {
        document.getElementById('loading-spinner').classList.add('hidden');
    });
</script>
@endsection
