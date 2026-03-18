@extends('layouts.app')

@section('content')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<div class="max-w-6xl mx-auto px-4 py-10">
    <h2 class="md:text-3xl text-xl font-bold text-center mb-10">Customer Reviews</h2>

    <!-- Star Filter -->
    <div class="flex justify-center mb-8 space-x-3">
        @for ($i = 5; $i >= 3; $i--)
            <a href="{{ route('reviews.positive', ['stars' => $i]) }}"
               class="px-4 py-1.5 rounded-full border text-sm font-medium transition {{ request('stars') == $i ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
               {{ $i }}★+
            </a>
        @endfor
        <a href="{{ route('reviews.positive') }}"
           class="px-4 py-1.5 rounded-full border text-sm font-medium transition {{ request('stars') ? 'text-gray-700 hover:bg-gray-100' : 'bg-blue-600 text-white' }}">
            All
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-8">
        <div class="flex flex-col md:flex-row">
            <!-- Left side: Rating distribution -->
            <div class="flex-grow p-6 space-y-3">
                @foreach ([5, 4, 3, 2, 1] as $rating)
                    @php
                        $ratingCount = $reviews->where('rating', $rating)->count();
                        $percentage = $totalReviews > 0 ? ($ratingCount / $totalReviews) * 100 : 0;
                    @endphp
                    <div class="flex items-center space-x-3">
                        <span class="text-lg font-medium text-gray-700 w-4">{{ $rating }}</span>
                        <span class="text-yellow-400 text-lg">★</span>
                        <div class="relative flex-grow bg-gray-200 rounded-full h-2.5">
                            <div class="bg-yellow-400 h-2.5 rounded-full" style="width: {{ $percentage }}%"></div>
                        </div>
                        <span class="text-lg font-medium text-gray-600 w-12 text-right">{{ $ratingCount }}</span>
                    </div>
                @endforeach
            </div>
            
            <!-- Right side: Average rating -->
            <div class="bg-yellow-50 p-8 md:w-64 flex flex-col items-center justify-center">
                <div class="text-5xl font-bold text-yellow-400 mb-4">{{ number_format($averageRating, 1) }}</div>
                <div class="flex mb-3">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="text-5xl text-yellow-400">★</span>
                    @endfor
                </div>
                <p class="text-gray-700 font-medium">{{ $totalReviews }} Ratings</p>
            </div>
        </div>
    </div>

    <!-- Reviews -->
    <div class="space-y-6">
        @forelse ($reviews as $review)
            <div class="bg-white shadow rounded-xl p-6" data-aos="fade-up">
                <div class="flex items-start space-x-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($review->name) }}&background=random&color=fff&size=64"
                         class="rounded-full w-12 h-12 mt-1" alt="{{ $review->name }} avatar">
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="font-semibold text-gray-900">{{ $review->name }}</div>
                                <div class="flex items-center text-sm text-gray-600 space-x-1">
                                    <!-- Stars -->
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.95 4.146.018c.958.004 1.355 1.226.584 1.818l-3.36 2.455 1.287 3.951c.3.922-.756 1.688-1.541 1.125L10 13.011l-3.353 2.333c-.785.563-1.841-.203-1.541-1.125l1.287-3.951-3.36-2.455c-.77-.592-.374-1.814.584-1.818l4.146-.018 1.286-3.95z"/>
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                            <div class="text-sm text-gray-400">
                                {{ $review->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <p class="mt-3 text-gray-800 text-sm leading-relaxed">
                            {{ $review->review }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">No positive reviews yet.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-10">
        {{ $reviews->appends(request()->query())->links() }}
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({ duration: 700, once: true });
</script>
@endsection
