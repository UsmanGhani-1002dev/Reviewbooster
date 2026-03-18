@extends('layouts.app')
@section('content')

<!-- Reviews Table -->
<div class="mb-12">
    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Negative Reviews</h2>
    
    <!-- Filters Section -->
    <div class="mb-6 p-6 bg-white rounded-lg shadow-md grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Status Filter -->
        <div class="flex flex-col space-y-2">
            <label for="statusFilter" class="text-sm font-medium text-gray-700">Status:</label>
            <select id="statusFilter" class="form-select w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500">
                <option value="">All</option>
                <option value="contacted">Contacted</option>
                <option value="resolved">Resolved</option>
                <option value="active">Active</option>
            </select>
        </div>
    
        <!-- Date Range Filter -->
        <div class="flex flex-col space-y-2">
            <label for="dateFrom" class="text-sm font-medium text-gray-700">Date From:</label>
            <input type="date" id="dateFrom" class="form-input w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" />
        </div>
    
        <div class="flex flex-col space-y-2">
            <label for="dateTo" class="text-sm font-medium text-gray-700">Date To:</label>
            <input type="date" id="dateTo" class="form-input w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" />
        </div>
    </div>
    

    <div class="overflow-x-auto bg-white rounded-xl shadow-md border border-gray-100 mb-8">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-black text-white">
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-50">Company</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-50">Customer</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-50">Email</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-50">Rating</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-50">Comment</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-50">Status</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-50">Date</th>
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-50">Actions</th>
                </tr>
            </thead>
            <tbody>
                 {{-- Ensure $reviews collection is passed --}}
                @forelse ($reviews as $review)
                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                    <td class="px-6 py-5 text-sm font-medium text-gray-800">{{ $review->card->business->legal_business_name ?? 'N/A' }}</td>
                    <td class="px-6 py-5 whitespace-nowrap">
                        <div class="flex items-center">
                            {{-- <div class="h-10 w-10 flex-shrink-0 mr-3">
                                <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                    <span class="text-blue-600 font-medium text-sm">{{ substr($review->name, 0, 1) }}</span>
                                </div>
                            </div> --}}
                            <div class="text-sm font-medium text-gray-800">{{ $review->name }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-5 text-sm text-gray-600">{{ $review->email }}</td>
                    <td class="px-6 py-5 rating" data-rating="{{ $review->rating }}">
                        <div class="flex text-yellow-400">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="text-lg {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-200' }}">★</span>
                            @endfor
                        </div>
                    </td>                    
                    <td class="px-6 py-5 text-sm text-gray-600 max-w-xs">
                        <div class="truncate">{{ $review->review }}</div>
                    </td>
                    <td class="px-6 py-5">
                        @if($review->status == 'contacted')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Contacted
                            </span>
                        @elseif($review->status == 'resolved')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Resolved
                            </span>
                        @elseif($review->status == 'active')
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Active
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                {{ ucfirst($review->status) }}
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-5 text-sm text-gray-500">{{ $review->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-5 text-sm">
                        <div class="flex items-center space-x-3">
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 transition-colors duration-200" title="Delete Review">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                            <button type="button" class="text-blue-600 hover:text-blue-900 transition-colors duration-200 view-review-btn" data-review-id="{{ $review->id }}" title="View Full Review">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                     <td colspan="7" class="px-6 py-12 text-center text-gray-500">No reviews found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



<!-- Modal for viewing full review -->
<div id="reviewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-lg w-full mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold text-gray-900">Review Details</h3>
            <button type="button" class="text-gray-400 hover:text-gray-600 close-modal">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="mb-4">
            <div class="flex items-center mb-3">
                <div id="modal-user-avatar" class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center mr-3 flex-shrink-0">
                    <span class="text-blue-600 font-medium text-sm"></span>
                </div>
                <div>
                    <h4 id="modal-user-name" class="font-medium text-gray-800"></h4>
                    <span id="modal-date" class="text-sm text-gray-500"></span>
                </div>
            </div>
            <div class="flex text-yellow-400 mb-3" id="modal-rating"></div>
            <p id="modal-review-text" class="text-gray-700 text-sm max-h-60 overflow-y-auto"></p>
        </div>
        <div class="mt-6 pt-4 border-t border-gray-200 flex justify-end items-center space-x-3">
            <div id="modal-approve-button-container">
                {{-- Button will be injected by JS if needed --}}
            </div>
             <button type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 close-modal">Close</button>
        </div>
    </div>
</div>

<!-- JavaScript for Modal -->
<script>

document.addEventListener('DOMContentLoaded', function () {
        const statusFilter = document.getElementById('statusFilter');
        const ratingFilter = document.getElementById('ratingFilter');
        const dateFrom = document.getElementById('dateFrom');
        const dateTo = document.getElementById('dateTo');
        const rows = document.querySelectorAll('tbody tr');

        function filterRows() {
            const statusValue = statusFilter.value.toLowerCase();
            const ratingValue = ratingFilter.value;
            const dateFromValue = dateFrom.value;
            const dateToValue = dateTo.value;

            rows.forEach(row => {
                const statusCell = row.querySelector('td:nth-child(5)');
                const ratingCell = row.querySelector('td:nth-child(3)');
                const dateCell = row.querySelector('td:nth-child(6)');
                const date = new Date(dateCell.textContent);

                // Get the numeric rating from the rating cell using data-rating
                const rating = parseInt(ratingCell.getAttribute('data-rating'));

                const statusMatches = !statusValue || statusCell.textContent.toLowerCase().includes(statusValue);
                const ratingMatches = !ratingValue || rating == ratingValue; // Match the numeric rating
                const dateMatches = (!dateFromValue || date >= new Date(dateFromValue)) && (!dateToValue || date <= new Date(dateToValue));

                if (statusMatches && ratingMatches && dateMatches) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }

        statusFilter.addEventListener('change', filterRows);
        ratingFilter.addEventListener('change', filterRows);
        dateFrom.addEventListener('change', filterRows);
        dateTo.addEventListener('change', filterRows);
    });


    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('reviewModal');
        const viewButtons = document.querySelectorAll('.view-review-btn');
        const closeButtons = document.querySelectorAll('.close-modal');

        // Review data - Make sure $reviews is properly JSON encoded
        const reviews = @json($reviews->keyBy('id')); // Key by ID for easier lookup

        // Open modal with review data
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const reviewId = this.getAttribute('data-review-id');
                const review = reviews[reviewId]; // Access review by ID

                if (review) {
                    // Set modal data
                    document.getElementById('modal-user-name').textContent = review.name;
                    document.getElementById('modal-date').textContent = new Date(review.created_at).toLocaleDateString('en-US', {
                        year: 'numeric', month: 'short', day: 'numeric'
                    });
                    document.getElementById('modal-user-avatar').querySelector('span').textContent = review.name.charAt(0).toUpperCase();

                    // Set rating stars
                    const ratingContainer = document.getElementById('modal-rating');
                    ratingContainer.innerHTML = ''; // Clear previous stars
                    for (let i = 1; i <= 5; i++) {
                        const star = document.createElement('span');
                        star.textContent = '★';
                        star.classList.add('text-xl');
                        if (i <= review.rating) {
                            star.classList.add('text-yellow-400');
                        } else {
                            star.classList.add('text-gray-200');
                        }
                        ratingContainer.appendChild(star);
                    }

                    document.getElementById('modal-review-text').textContent = review.review;

                    // Set approve/status button logic
                    const approveContainer = document.getElementById('modal-approve-button-container');
                    approveContainer.innerHTML = ''; // Clear previous button

                    if (review.status !== 'approved') {
                         // Construct approve URL dynamically
                        let approveUrl = `{{ url('reviews') }}/${review.id}/approve`; // Adjust URL structure if needed

                        approveContainer.innerHTML = `
                            <form action="${approveUrl}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 text-sm font-medium">
                                    Approve Review
                                </button>
                            </form>
                        `;
                    } else {
                       approveContainer.innerHTML = `
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Approved
                            </span>
                       `;
                    }

                    // Show modal
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.style.overflow = 'hidden'; // Prevent background scroll
                } else {
                    console.error('Review data not found for ID:', reviewId);
                }
            });
        });

        // Function to close modal
        const closeModal = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = ''; // Restore background scroll
        };

        // Close modal listeners
        closeButtons.forEach(button => {
            button.addEventListener('click', closeModal);
        });

        // Close modal when clicking outside the modal content
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Close modal on Escape key press
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>


<!-- Recent Reviews Section -->
    <div class="space-y-4 mt-12">
        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Recent Reviews</h2>
        @foreach ($reviews->sortByDesc('created_at')->take(10) as $review)
        <div class="border border-gray-200 p-6 rounded-lg shadow-sm bg-white" data-aos="fade-up">
            <div class="flex text-yellow-400 mb-2">
                @for ($i = 1; $i <= 5; $i++)
                    <span class="text-3xl {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-200' }}">★</span>
                @endfor
            </div>
            <div class="flex items-center mb-2">
                <div class="w-10 h-10 rounded-full bg-gray-200 overflow-hidden flex-shrink-0">
                    @if($review->avatar)
                        <img src="{{ $review->avatar }}" alt="{{ $review->name }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($review->name) }}&background=random&color=fff&size=64"
                             alt="{{ $review->name }} avatar" class="w-full h-full object-cover">
                    @endif
                </div>
                <div class="ml-3 flex flex-col justify-center w-full">
                    <div class="flex justify-between items-center">
                        <span class="font-medium text-xl text-blue-600">{{ $review->name }}</span>
                        <span class="text-gray-400 text-sm">{{ $review->created_at->format('M d, Y') }}</span>
                    </div>
                    <span class="text-sm text-gray-500 italic">Business: {{ $review->card->business->legal_business_name ?? 'N/A' }}</span>
                </div>
            </div>
            <div class="text-gray-600 text-md">
                {{ $review->review }}
            </div>
        </div>
        @endforeach
    </div>


@endsection