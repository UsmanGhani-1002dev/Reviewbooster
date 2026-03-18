@extends('layouts.guest')

@section('content')
<div class="container mx-auto p-8 max-w-2xl mt-10">
    <div class="bg-white shadow-md border border-gray-100 rounded-lg p-8">
        <!-- Form Title -->
        <h1 class="text-3xl font-semibold text-gray-800 mb-8">Submit Your Review</h1>

        <!-- Review Form -->
        <form id="review-form" action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
            @csrf

            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <style>
                .star{
                    
                    stroke: #fbbf24;
                    stroke-width: 1px;
                }
            </style>

            <!-- Rating -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Add Your Rating <span class="text-red-500">*</span>
                </label>
                <div class="flex gap-2">
                    <input type="hidden" name="rating" id="rating-input" value="">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-10 h-10 text-gray-50 cursor-pointer hover:scale-110 transition-all duration-200 star" 
                            fill="currentColor" viewBox="0 0 24 24" data-value="{{ $i }}">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                    @endfor
                </div>
            </div>

            <!-- Two-column layout for Name and Email -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" required placeholder="John Doe"
                        class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none shadow-sm" />
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" required placeholder="mail@pagedone.com"
                        class="w-full p-3 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none shadow-sm" />
                </div>
            </div>

            <!-- Review Text -->
            <div>
                <label for="review" class="block text-gray-700 font-medium mb-2">
                    Write Your Review <span class="text-red-500">*</span>
                </label>
                <textarea id="review" name="review" rows="5" required placeholder="Write your review here..."
                    class="w-full p-4 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none shadow-sm"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="pt-6">
                <button type="submit"
                    class="w-full px-8 py-3 bg-green-700 hover:bg-green-800 text-white font-medium rounded-md transition duration-200">
                    Submit Review
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Loading Spinner -->
<div id="loading-spinner" class="hidden fixed top-0 left-0 w-full h-full bg-opacity-50 bg-gray-900 flex justify-center items-center z-50">
    <div class="animate-spin rounded-full border-t-4 border-b-4 border-green-500 w-16 h-16"></div>
</div>

<!-- Star Rating Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating-input');
        let selectedRating = 0;

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                selectedRating = index + 1;
                ratingInput.value = selectedRating;
                updateStars(selectedRating);
            });

            star.addEventListener('mouseover', () => {
                updateStars(index + 1);
            });

            star.addEventListener('mouseout', () => {
                updateStars(selectedRating);
            });
        });

        function updateStars(rating) {
            stars.forEach((star, i) => {
                if (i < rating) {
                    star.classList.add('text-yellow-400');
                    star.classList.remove('text-gray-200');
                } else {
                    star.classList.add('text-gray-200');
                    star.classList.remove('text-yellow-400');
                }
            });
        }

        const form = document.getElementById('review-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission for now
            document.getElementById('loading-spinner').classList.remove('hidden');
            
            setTimeout(function() {
                form.submit();
            }, 2000); 
        });
        
        window.addEventListener('pageshow', function () {
        const spinner = document.getElementById('loading-spinner');
        if (spinner) {
            spinner.classList.add('hidden');
        }
    });
    });
</script>
@endsection
