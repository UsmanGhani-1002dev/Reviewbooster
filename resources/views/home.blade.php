@extends('layouts.guest')
@section('content')

    <div class="min-h-screen bg-[url('images/background.jpg')] bg-cover bg-no-repeat relative -mt-[100px] pt-[120px]">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-32 h-32 bg-blue-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-24 h-24 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-1000"></div>
            <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-indigo-400 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-2000"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 font-mulish">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-16">
                <!-- Hero Section -->
                <div class="text-center mb-16">
                    <h1 class="text-3xl md:text-3xl lg:text-[57px] font-bold font-ubuntu text-[#142d63] mb-8 !leading-[1.3]">
                        Boost Your Google Reviews <br>
                        Quickly and Easily with <span class="text-transparent font-ubuntu bg-clip-text bg-gradient-to-r from-[#142d63] to-[#01A0FF]">ReviewBooster</span>
                    </h1>

                    <p class="text-lg md:text-[18px] text-gray-600 font-mulish max-w-3xl mx-auto mb-12 leading-relaxed">
                        You're already talking to customers — why not get more Google reviews? With just one tap, ReviewBooster helps you collect real reviews, boost visibility, and grow your reputation effortlessly.
                    </p>


                    <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-12">
                        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 text-lg font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                            Get your account
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-700 px-8 py-4 text-lg font-semibold border-2 border-blue-600 rounded-lg hover:bg-blue-50 transition-all duration-300">
                            Learn more
                        </a>
                    </div>
                </div>

                <!-- Dashboard Preview Section -->
                <div class="relative max-w-6xl mx-auto">
                    <!-- Main Dashboard Image Container -->
                    <div class="relative bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-200">
                        <!-- Browser Chrome -->
                        <div class="bg-gradient-to-r from-[#1a237e] to-[#142D63] px-4 py-4 border-b border-gray-200">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            </div>
                        </div>
                        
                        <!-- Dashboard Content -->
                        <div class="bg-white p-2">
                            <div class="flex items-center justify-between mb-2 ">
                                <img src="images/logo.png" class="w-[121px] h-[58px]">
                                <div class="flex space-x-6 text-[#1a237e] font-medium pr-4">
                                    <span class="hover:text-[#00A0FF]">Dashboard</span>
                                    <span class="hover:text-[#00A0FF]">Reviews</span>
                                    <span class="hover:text-[#00A0FF]">Cards</span>
                                </div>
                            </div>

                            <div class="bg-white rounded-lg p-4">
                                <!-- Stats Grid with Hover Effects -->
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 stagger-animation">
                                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 hover-lift border border-blue-200/50" style="--stagger: 1;">
                                        <div class="text-sm text-blue-600 font-semibold mb-2 uppercase tracking-wide">Review Stats</div>
                                        <div class="text-4xl font-black text-blue-700 mb-2">25,140</div>
                                        <div class="flex items-center text-sm text-green-600 font-semibold">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            +15% last 30 days
                                        </div>
                                    </div>
                                    
                                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 hover-lift border border-purple-200/50" style="--stagger: 2;">
                                        <div class="text-sm text-purple-600 font-semibold mb-2 uppercase tracking-wide">Card Taps</div>
                                        <div class="text-4xl font-black text-purple-700 mb-2">50+</div>
                                        <div class="flex items-center text-sm text-green-600 font-semibold">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            +22% this month
                                        </div>
                                    </div>

                                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 hover-lift border border-green-200/50" style="--stagger: 3;">
                                        <div class="text-sm text-green-600 font-semibold mb-2 uppercase tracking-wide">Feedback</div>
                                        <div class="text-4xl font-black text-green-700 mb-2">98.2%</div>
                                        <div class="flex items-center text-sm text-green-600 font-semibold">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            +8% improvement
                                        </div>
                                    </div>
                                </div>

                                <!-- Chart Area -->
                                <!-- Enhanced Chart Area -->
                                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 border border-gray-200/50">
                                    <div class="flex items-center justify-between mb-6">
                                        <h3 class="text-lg font-bold text-gray-800">Performance Analytics</h3>
                                        <div class="flex space-x-2">
                                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                            <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
                                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                        </div>
                                    </div>
                                    <div class="h-64 flex items-center justify-center relative overflow-hidden">
                                        <svg class="w-full h-full" viewBox="0 0 600 200">
                                            <defs>
                                                <linearGradient id="chartGradient1" x1="0%" y1="0%" x2="0%" y2="100%">
                                                    <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:0.8" />
                                                    <stop offset="100%" style="stop-color:#3B82F6;stop-opacity:0.1" />
                                                </linearGradient>
                                                <linearGradient id="chartGradient2" x1="0%" y1="0%" x2="0%" y2="100%">
                                                    <stop offset="0%" style="stop-color:#8B5CF6;stop-opacity:0.6" />
                                                    <stop offset="100%" style="stop-color:#8B5CF6;stop-opacity:0.1" />
                                                </linearGradient>
                                            </defs>
                                            
                                            <!-- Primary Chart Line -->
                                            <path d="M0,160 L75,140 L150,100 L225,80 L300,60 L375,40 L450,50 L525,30 L600,20" 
                                                stroke="#3B82F6" stroke-width="4" fill="none" stroke-linecap="round"/>
                                            <path d="M0,160 L75,140 L150,100 L225,80 L300,60 L375,40 L450,50 L525,30 L600,20 L600,200 L0,200 Z" 
                                                fill="url(#chartGradient1)"/>
                                            
                                            <!-- Secondary Chart Line -->
                                            <path d="M0,180 L75,160 L150,130 L225,110 L300,90 L375,70 L450,80 L525,60 L600,50" 
                                                stroke="#8B5CF6" stroke-width="3" fill="none" stroke-linecap="round"/>
                                            <path d="M0,180 L75,160 L150,130 L225,110 L300,90 L375,70 L450,80 L525,60 L600,50 L600,200 L0,200 Z" 
                                                fill="url(#chartGradient2)"/>
                                                
                                            <!-- Data Points -->
                                            <circle cx="75" cy="140" r="4" fill="#3B82F6" class="hover:r-6 transition-all"/>
                                            <circle cx="225" cy="80" r="4" fill="#3B82F6" class="hover:r-6 transition-all"/>
                                            <circle cx="450" cy="50" r="4" fill="#3B82F6" class="hover:r-6 transition-all"/>
                                        </svg>
                                        
                                        <!-- Floating Data Labels -->
                                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg px-3 py-2 text-sm font-semibold text-gray-700 shadow-lg">
                                            📈 +127% Growth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile Preview -->
                    <div class="absolute right-6 -bottom-8 md:-right-8 md:-bottom-8 transform rotate-12 hover:rotate-6 transition-transform duration-500">
                        <div class="bg-gray-400 rounded-2xl p-2 shadow-2xl w-48 h-96">
                            <div class="bg-white rounded-xl p-3 h-full">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-blue-600 text-sm font-bold">Reviewbooster</div>
                                    <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-green-600 rounded-full flex items-center justify-center shadow-lg">
                                            <span class="text-white text-sm font-bold">✓</span>
                                    </div>
                                </div>
                                
                                <div class="space-y-3">
                                    <div class="bg-gray-100 rounded p-2">
                                        <div class="text-xs text-gray-600">TOTAL REVIEWS</div>
                                        <div class="text-lg font-bold text-blue-600">25,140</div>
                                        <div class="text-xs text-green-500">↗ 15%</div>
                                    </div>
                                    
                                    <div class="bg-blue-50 rounded p-3 h-24">
                                        <svg class="w-full h-full" viewBox="0 0 120 60">
                                            <path d="M0,50 L20,40 L40,30 L60,20 L80,15 L100,10 L120,8" 
                                                stroke="#3B82F6" stroke-width="2" fill="none"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

   <!-- Features Section -->
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-[38px] font-bold text-[#142D63] mb-6 font-ubuntu ">
                    How It Works.
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto font-mulish">
                    ReviewBoost helps you collect, manage, and showcase real reviews to grow your reputation and win more customers.
                </p>
            </div>

             <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="relative text-center p-6 transition-transform transform hover:scale-105 shadow-lg hover:border hover:border-[#e2e8f0] rounded-xl bg-white">
                    <div class="absolute -top-5 left-1/2 transform -translate-x-1/2">
                        <div class="w-10 h-10 rounded-full bg-[#E0F4FF] text-[#00A0FF] font-bold flex items-center justify-center shadow-md">
                            1
                        </div>
                    </div>
                    <div class="w-16 h-16 flex items-center justify-center mx-auto mb-6 mt-5">
                        <img src="images/customer.png" class="w-16 h-16 text-blue-600" alt="Tap Card Icon"/>
                    </div>
                    <h3 class="text-[21px] font-semibold text-[#142D63] mb-3 font-ubuntu">Setup Your Tap Cards</h3>
                    <p class="text-gray-600">Order your NFC tap cards. Cards are pre-configured with your business details and shipped worldwide within 48 hours.</p>
                </div>

                <!-- Step 2 -->
                <div class="relative text-center p-6 transition-transform transform hover:scale-105 shadow-lg hover:border hover:border-[#e2e8f0] rounded-xl bg-white">
                    <div class="absolute -top-5 left-1/2 transform -translate-x-1/2">
                        <div class="w-10 h-10 rounded-full bg-[#E0F4FF] text-[#00A0FF] font-bold flex items-center justify-center shadow-md">
                            2
                        </div>
                    </div>
                    <div class="w-20 h-20 flex items-center justify-center mx-auto mb-2 mt-5">
                        <img src="images/cardss.png" class="w-16 h-14 text-yellow-600" alt="Card Icon"/>
                    </div>
                    <h3 class="text-[21px] font-semibold text-[#142D63] mb-3 font-ubuntu">Card Creation & Distribution</h3>
                    <p class="text-gray-600">Receive your personalized plastic cards and distribute them to your staff. Each employee gets their own trackable card with unique ID.</p>
                </div>

                <!-- Step 3 -->
                <div class="relative text-center p-6 transition-transform transform hover:scale-105 shadow-lg hover:border hover:border-[#e2e8f0] rounded-xl bg-white">
                    <div class="absolute -top-5 left-1/2 transform -translate-x-1/2">
                        <div class="w-10 h-10 rounded-full bg-[#E0F4FF] text-[#00A0FF] font-bold font-ubuntu flex items-center justify-center shadow-md">
                            3
                        </div>
                    </div>
                    <div class="w-16 h-16 flex items-center justify-center mx-auto mb-6 mt-5">
                        <img src="images/app.png" class="w-16 h-16 text-green-600" alt="Review Icon"/>
                    </div>
                    <h3 class="text-[21px] font-semibold text-[#142D63] mb-3 font-ubuntu">Customer Review Process</h3>
                    <p class="text-gray-600">Customers tap the NFC card on their phone and are instantly taken to your Google review page. Optional Review Gate filters negative feedback privately.</p>
                </div>

                <!-- Step 4 -->
                <div class="relative text-center p-6 transition-transform transform hover:scale-105 shadow-lg hover:border hover:border-[#e2e8f0] rounded-xl bg-white">
                    <div class="absolute -top-5 left-1/2 transform -translate-x-1/2">
                        <div class="w-10 h-10 rounded-full bg-[#E0F4FF] text-[#00A0FF] font-bold flex items-center justify-center shadow-md">
                            4
                        </div>
                    </div>
                    <div class="w-16 h-16 flex items-center justify-center mx-auto mb-6 mt-5">
                        <img src="images/analytics.png" class="w-16 h-16 text-purple-600" alt="Analytics Icon"/>
                    </div>
                    <h3 class="text-[21px] font-semibold text-[#142D63] mb-3 font-ubuntu">Monitor, Track & Optimize</h3>
                    <p class="text-gray-600">Track all reviews in your dashboard, monitor staff performance with leaderboards, and use AI to automatically respond to every review.</p>
                </div>
            </div>

            <button class="bg-[#00A0FF] mt-16 text-white py-3 px-8 rounded-xl font-semibold transition duration-300 hover:bg-blue-500 focus:outline-none focus:ring-2  justify-center mx-auto block text-center text-lg ">
                Read More
            </button>
        </div>
    </div>

    <!-- About Section -->
    <section class="relative overflow-hidden bg-[#f1f4f8]">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 md:gap-20">
            <!-- Content -->
            <div>
                <h2 class="text-4xl font-bold text-[#142D63] mb-6 font-ubuntu">Filter Out Negative Reviews with the Review Gate</h2>
                <p class="text-gray-700 text-lg leading-relaxed mb-6 font-mulish">
                The Review Gate is a smart feature in your dashboard designed to protect your online reputation.
                When a customer taps your NFC card, they’re asked to rate their experience.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed mb-6 font-mulish">
                If it’s positive, they’re guided straight to your Google review page. If negative, they’re asked
                for private feedback — sent directly to you instead of being posted publicly.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed font-mulish">
                This process helps you handle unhappy customers offline and significantly reduce negative reviews.
                </p>
            </div>

            <!-- Image -->
            <div class="flex justify-center">
                <img src="images/reviewgate.png" alt="Review Gate Illustration" class="w-full max-w-xl rounded-xl shadow-lg" />
            </div>
            </div>
        </div>
    </section>

    <!-- About 2 Section -->
   <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col-reverse md:flex-row items-center gap-8 md:gap-20">

            <!-- Left Side: Image (shown after text on mobile) -->
            <div class="flex justify-center md:justify-start w-full md:w-1/2">
                <img src="images/dashbaord.png" alt="Dashboard preview"
                    class="w-full max-w-2xl rounded-2xl shadow-xl" />
            </div>

            <!-- Right Side: Text (shown first on mobile) -->
            <div class="w-full md:w-1/2">
                <h2 class="text-4xl font-bold text-[#142D63] mb-6 font-ubuntu">
                    Keep Track in your Dashboard
                </h2>
                <p class="text-gray-700 text-lg leading-relaxed mb-4 font-mulish">
                    Keep track of all the reviews you receive inside your own dashboard.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed mb-4 font-mulish">
                    Easily view your latest customer feedback, monitor the number of new reviews, and track changes in your Google star rating.
                    Compare positive and negative feedback at a glance and measure employee performance by seeing
                    how many reviews each team member contributes—giving you clear insights to improve and grow your business.
                </p>
            </div>

        </div>
    </section>


    <!-- Membership Plan Section -->
    <style>
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 1s ease forwards;
        }
    </style>
    <div class="bg-white pt-16 pb-24 sm:pb-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-[#142d63] text-center mb-6 font-ubuntu">Membership Plans</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto font-mulish">
                    Simple, transparent pricing that grows with you. Choose the plan that's right for your business.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($cards as $index => $card)
                    @php
                        $planColors = [
                            0 => [
                                // First plan (Basic)
                                'badge_bg' => 'bg-blue-100',
                                'badge_text' => 'text-blue-600',
                                'button_bg' => 'bg-[#029CF9]',
                                'button_hover' => 'hover:bg-blue-700',
                                'border' => 'border-gray-200',
                                'card_bg' => '',
                                'is_popular' => false,
                            ],
                            1 => [
                                // Second plan (Standard)
                                'badge_bg' => 'bg-blue-200',
                                'badge_text' => 'text-blue-700',
                                'button_bg' => 'bg-[#029CF9]',
                                'button_hover' => 'hover:bg-blue-800',
                                'border' => 'border-2 border-blue-600',
                                'card_bg' => 'bg-blue-50',
                                'is_popular' => true,
                            ],
                            2 => [
                                // Third plan (Premium)
                                'badge_bg' => 'bg-purple-100',
                                'badge_text' => 'text-purple-600',
                                'button_bg' => 'bg-[#029CF9]',
                               'button_hover' => 'hover:bg-blue-700',
                                'border' => 'border-gray-200',
                                'card_bg' => '',
                                'is_popular' => false,
                            ],
                        ];

                        // Use index or is_popular field from database
                        $colors = $planColors[$index] ?? $planColors[0];
                        if (isset($card->is_popular) && $card->is_popular) {
                            $colors['is_popular'] = true;
                        }

                        // Animation delay
                        $animationDelay = $index * 0.15;
                    @endphp

                    <!-- {{ $card->name }} Plan -->
                    <div class="relative rounded-2xl {{ $colors['border'] }} p-8 shadow-md transition-all duration-500 ease-in-out transform hover:scale-105 {{ $colors['card_bg'] }} opacity-0 animate-fade-in-up"
                        style="animation-delay: {{ $animationDelay }}s">

                        @if ($colors['is_popular'])
                            <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                                <span
                                    class="bg-[#029CF9] text-white text-xs px-4 py-1 rounded-full uppercase tracking-wider shadow">
                                    {{ $card->popular_badge ?? 'Most Popular' }}
                                </span>
                            </div>
                        @endif

                        <div class="mb-6 {{ $colors['is_popular'] ? '' : '' }}">
                            <span
                                class="inline-block text-sm font-medium capitalize {{ $colors['badge_text'] }} {{ $colors['badge_bg'] }} px-3 py-1 rounded-full">
                                {{ $card->name }}
                            </span>
                        </div>

                        <h3 class="text-4xl font-bold text-gray-900 mb-2 font-ubuntu">
                            ${{ number_format($card->price, 0) }}<span class="text-base font-medium text-gray-500">{{ $card->price_suffix ?? '/month' }}</span>
                        </h3>

                        <div class="text-gray-600 mb-6 text-sm font-mulish !leading-[35px] mt-4">{!! $card->description !!}</div>

                        <a href="/register?plan={{ $card->id }}"
                            class="block text-center w-full {{ $colors['button_bg'] }} text-white py-3 rounded-xl font-semibold transition-all duration-500 {{ $colors['button_hover'] }}">
                                Order Now
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <section class="relative bg-cover bg-center bg-no-repeat text-[#142D63] py-24 px-4 sm:px-6 lg:px-8 font-mulish" style="background-image: url('https://d1yei2z3i6k35z.cloudfront.net/161/609bb9ff8ffc9_Groupedemasques1.jpg');">
        <div class="relative max-w-3xl mx-auto text-center">
            <h2 class="text-3xl sm:text-4xl font-bold mb-4 leading-tight font-ubuntu ">
            Ready to boost your customer reviews?
            </h2>
            <p class="text-lg sm:text-md mb-8 leading-relaxed">
            Start collecting real, verified reviews and grow your business reputation. Try ReviewBooster today — it’s fast, simple, and effective.
            </p>
            <div class="flex justify-center gap-4 flex-wrap">
            <a href="register" class="bg-white text-[#00A0FF] hover:bg-gray-100 px-6 py-3 rounded-full font-semibold shadow-md transition">
                Get Started Free
            </a>
            <a href="contact" class="border border-[#00A0FF] px-6 py-3 rounded-full font-semibold hover:bg-white hover:text-[#00A0FF] transition">
                Contact Us
            </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="bg-gray-50 py-20 px-4 sm:px-6 lg:px-8 font-mulish">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl sm:text-4xl font-bold text-[#142d63] text-center mb-10 font-ubuntu">
            Frequently Asked Questions
            </h2>

            <div class="space-y-4" x-data="{ selected: null }">
            <!-- FAQ 1 -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <button @click="selected !== 1 ? selected = 1 : selected = null" class="w-full px-6 py-5 text-left flex justify-between items-center">
                <span class="text-lg font-semibold text-[#142d63]">What type of businesses does this work for?</span>
                <svg :class="selected === 1 ? 'rotate-180' : ''" class="w-5 h-5 transition-transform transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                </button>
                <div x-show="selected === 1" x-collapse class="px-6 pb-4 text-gray-600">
                The Review Boost system will work for any business that sees its customers or clients face to face and so can tap the card on the customer's phone. As an example, we have users who are hairdressers, restaurants, plumbers, beauty salons, electricians etc.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <button @click="selected !== 2 ? selected = 2 : selected = null" class="w-full px-6 py-5 text-left flex justify-between items-center">
                <span class="text-lg font-semibold text-[#142d63]">Do the Tap Cards work on every phone?</span>
                <svg :class="selected === 2 ? 'rotate-180' : ''" class="w-5 h-5 transition-transform transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                </button>
                <div x-show="selected === 2" x-collapse class="px-6 pb-4 text-gray-600">
                The Tap Cards work on both iPhone and Android phones. If your customer has an old non-smartphone though, the Tap Card may not work. There are also some older iPhones where the customer would need to enable the function so that the card works. They do work on the vast majority of phones though, and for the few that don't, we also include a QR code on every card that the customer can scan with their phone instead.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <button @click="selected !== 3 ? selected = 3 : selected = null" class="w-full px-6 py-5 text-left flex justify-between items-center">
                <span class="text-lg font-semibold text-[#142d63]">Will it improve my Google ranking?</span>
                <svg :class="selected === 3 ? 'rotate-180' : ''" class="w-5 h-5 transition-transform transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                </button>
                <div x-show="selected === 3" x-collapse class="px-6 pb-4 text-gray-600">
                Yes. More positive reviews help improve your visibility in Google search and maps.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <button @click="selected !== 4 ? selected = 4 : selected = null" class="w-full px-6 py-5 text-left flex justify-between items-center">
                <span class="text-lg font-semibold text-[#142d63]">If an employee leaves, can a Tap Card be used by someone else?</span>
                <svg :class="selected === 4 ? 'rotate-180' : ''" class="w-5 h-5 transition-transform transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                </button>
                <div x-show="selected === 4" x-collapse class="px-6 pb-4 text-gray-600">
                Yes of course. You can simply log in to your Dashboard and change the employee's name to the new name. The new person will then be able to use the same Tap Card and will appear on the Leaderboard as the new name.
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <button @click="selected !== 5 ? selected = 5 : selected = null" class="w-full px-6 py-5 text-left flex justify-between items-center">
                <span class="text-lg font-semibold text-[#142d63]">What happens after I place my order?</span>
                <svg :class="selected === 5 ? 'rotate-180' : ''" class="w-5 h-5 transition-transform transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                </button>
                <div x-show="selected === 5" x-collapse class="px-6 pb-4 text-gray-600">
                Once you've placed your order we'll send you an email asking you for some information to enable us to set up your Review Boost system, including the names of the staff that you want to have Tap Cards etc.<br>
                We'll then create your Dashboard login, add your staff to the system and create their Tap Cards.<br>
                Then we'll send you an email with your Dashboard login info and send you your Tap Cards in the post.<br>

                This is normally all done within 48 hours of receiving your order so you'll be able to start getting more reviews within days.
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <button @click="selected !== 6 ? selected = 6 : selected = null" class="w-full px-6 py-5 text-left flex justify-between items-center">
                <span class="text-lg font-semibold text-[#142d63]">How quickly will we see results?</span>
                <svg :class="selected === 6 ? 'rotate-180' : ''" class="w-5 h-5 transition-transform transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                </button>
                <div x-show="selected === 6" x-collapse class="px-6 pb-4 text-gray-600">
                This is the great thing about Review Boost Tap Cards... most businesses start to see results the very first day they begin using their cards. New 4 and 5-star reviews which immediately get seen by new potential customers. All leading to more business for you as well as higher rankings in the search engines.
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <button @click="selected !== 7 ? selected = 7 : selected = null" class="w-full px-6 py-5 text-left flex justify-between items-center">
                <span class="text-lg font-semibold text-[#142d63]">Why do we need more reviews and regular  reviews?</span>
                <svg :class="selected === 7 ? 'rotate-180' : ''" class="w-5 h-5 transition-transform transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                </button>
                <div x-show="selected === 7" x-collapse class="px-6 pb-4 text-gray-600">
                This is for two main reasons... Customers and Search Engines.<br><br>

                <span class="font-bold">1. Customers:</span> In this day and age, before we buy anything on Amazon, choose a restaurant to eat at, or decide to use any business, we check their reviews. If they don't have a high star rating or don't have good recent reviews, we move on and look at another option. So you need good reviews on a regular basis so that customers will choose your business.<br><br>

                <span class="font-bold">2. Search Engines:</span> Google and the other search engines want to give their users the best results possible when they do a search. So they want to show them the best businesses first. You guessed it - one of the main ways they decide which businesses are best is by looking at the recent quality reviews. So they will rank a business with lots of quality 4 and 5-star reviews higher than a business with a few 3-star reviews.
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <button @click="selected !== 8 ? selected = 8 : selected = null" class="w-full px-6 py-5 text-left flex justify-between items-center">
                <span class="text-lg font-semibold text-[#142d63]">How fast can I start getting reviews?</span>
                <svg :class="selected === 8 ? 'rotate-180' : ''" class="w-5 h-5 transition-transform transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                </button>
                <div x-show="selected === 8" x-collapse class="px-6 pb-4 text-gray-600">
                Instantly. Once your account is live, you can begin collecting reviews the same day with your smart tap card or link.
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <style>
        .testimonial-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid #e2e8f0;
        }
        .quote-icon {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }
        .star-rating {
            color: #fbbf24;
        }
    </style>

    <div class="max-w-6xl mx-auto px-4 pt-8">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-[#142D63] mb-4 font-ubuntu">What Our Customers Say</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto font-mulish">
                Discover how businesses across the UK are transforming their online reputation with Review Boost
            </p>
        </div>

        <!-- Featured Success Story -->
        <div class="bg-gradient-to-r from-[#142D63] to-[#00A0FF] rounded-2xl p-8 mb-16 text-white">
            <div class="max-w-4xl mx-auto text-center">
                <div class="quote-icon w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                    </svg>
                </div>
                <blockquote class="text-base sm:text-xl md:text-2xl font-medium mb-6 italic font-mulish">
                    "We went from getting less than 4 reviews per month to 15 reviews in our very first week! Our Google rating jumped from 4.2 to 4.7 stars. The tap cards are so simple - customers love how easy it is."
                </blockquote>
                <div class="flex justify-center mb-4">
                    <div class="flex star-rating">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
                <cite class="text-lg font-semibold">Raj Patel</cite>
                <p class="text-blue-100 mt-1">Owner, Spice Garden Indian Restaurant, London</p>
            </div>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Testimonial 1 -->
            <div class="testimonial-card rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex star-rating mb-4">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <blockquote class="text-gray-700 mb-4 italic">
                    "The staff leaderboard has been a game-changer! My team is now competing to get the most reviews. We've gone from 2-3 reviews per month to 25+ reviews. Our Google ranking has improved dramatically."
                </blockquote>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                        SM
                    </div>
                    <div>
                        <cite class="text-[#142D63] font-semibold">Sarah Mitchell</cite>
                        <p class="text-gray-500 text-sm">Salon Owner, Manchester</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex star-rating mb-4">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <blockquote class="text-gray-700 mb-4 italic">
                    "The Review Gate feature is brilliant! It's helped us avoid several negative reviews by letting us address issues privately first. Our average rating has stayed consistently high at 4.8 stars."
                </blockquote>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                        MT
                    </div>
                    <div>
                        <cite class="text-[#142D63] font-semibold">Mike Thompson</cite>
                        <p class="text-gray-500 text-sm">Plumbing Services, Birmingham</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex star-rating mb-4">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <blockquote class="text-gray-700 mb-4 italic">
                    "Best investment I've made for my business! The AI Review Responder saves me hours every week. I now have over 200 Google reviews and we're the top-rated dental practice in our area."
                </blockquote>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                        EH
                    </div>
                    <div>
                        <cite class="text-[#142D63] font-semibold">Dr. Emma Harrison</cite>
                        <p class="text-gray-500 text-sm">Dental Practice, Leeds</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection