<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-3xl text-gray-900 animate-fade-down">Event Board</h2>
        </div>
    </x-slot>
    <style>
        .bg_img {
            background-image: url('{{ asset('images/dash_board.png') }}');
            background-size: cover;
            /* Ensures the image covers the entire section */
            background-position: center;
            /* Centers the image */
            background-repeat: no-repeat;
            /* Prevents the image from repeating */
            height: 90vh;
            /* Sets the height to 100% of the viewport */
            width: 100%;
            /* Ensures the image spans the full width */
            position: relative;
            /* Allows for overlay positioning */
        }

        .bg_overlay {
            background: rgba(0, 0, 0, 0.6);
            /* Adds a dark overlay */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            /* Ensures the overlay is above the background image */
        }
    </style>

    <!-- Hero Section -->
    <section class="bg_img">
        <div class="bg_overlay"></div> <!-- Dark overlay for better text visibility -->
        <div
            class="relative max-w-6xl mx-auto text-center text-white px-6 flex flex-col justify-center items-center h-full z-10">
            <h1 class="text-5xl font-extrabold mb-6 leading-tight text-white animate-fade-in">
                Simplify Your Event Management
            </h1>
            <p class="text-lg text-gray-300 animate-slide-up">
                Plan, organize, and manage your events and guests with ease.
            </p>
            <div class="mt-8 flex justify-center space-x-4">
                <a href="{{ route('events.create') }}"
                    class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-full hover:bg-indigo-700 transition transform hover:scale-105 shadow-lg">
                    Create Event
                </a>
                <a href="{{ route('guests.create') }}"
                    class="px-6 py-3 bg-green-600 text-white font-semibold rounded-full hover:bg-green-700 transition transform hover:scale-105 shadow-lg">
                    Add Guest
                </a>
            </div>
        </div>
    </section>

    <!-- What We Offer -->
    <!-- What We Offer -->
    <section class="py-16 bg-gradient-to-br from-gray-100 to-gray-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-10">
                <!-- Events Card -->
                <div
                    class="relative bg-indigo-600 text-white rounded-lg shadow-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-2xl">
                    <div class="absolute inset-0 bg-indigo-700 opacity-80"></div>
                    <div class="relative p-8 space-y-6">
                        <div class="flex items-center justify-center w-16 h-16 bg-white rounded-full shadow-lg">
                            <i class="fas fa-calendar-alt text-indigo-600 text-3xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold">Events</h3>
                        <p class="text-gray-200">Easily plan and manage events with tools designed for efficiency.
                        </p>
                        <a href="{{ route('events.index') }}"
                            class="inline-block px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow-md hover:bg-gray-100 transition">
                            View Events →
                        </a>
                    </div>
                </div>

                <!-- Guests Card -->
                <div
                    class="relative bg-green-600 text-white rounded-lg shadow-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-2xl">
                    <div class="absolute inset-0 bg-green-700 opacity-80"></div>
                    <div class="relative p-8 space-y-6">
                        <div class="flex items-center justify-center w-16 h-16 bg-white rounded-full shadow-lg">
                            <i class="fas fa-users text-green-600 text-3xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold">Guests</h3>
                        <p class="text-gray-200">Manage your guest list, send invites, and track confirmations
                            seamlessly.</p>
                        <a href="{{ route('guests.index') }}"
                            class="inline-block px-6 py-3 bg-white text-green-600 font-semibold rounded-lg shadow-md hover:bg-gray-100 transition">
                            View Guests →
                        </a>
                    </div>
                </div>

                <!-- Get Started Quickly Card -->
                <div
                    class="relative bg-purple-600 text-white rounded-lg shadow-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-2xl">
                    <div class="absolute inset-0 bg-purple-700 opacity-80"></div>
                    <div class="relative p-8 space-y-6">
                        <div class="flex items-center justify-center w-16 h-16 bg-white rounded-full shadow-lg">
                            <i class="fas fa-bolt text-purple-600 text-3xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold">Get Started Quickly</h3>
                        <p class="text-gray-200">Access essential tools to create events and manage guests instantly.
                        </p>
                        <div class="space-y-4">
                            <a href="{{ route('events.create') }}"
                                class="block px-6 py-3 bg-white text-purple-600 font-semibold rounded-lg shadow-md hover:bg-gray-100 transition">
                                Create Event
                            </a>
                            <a href="{{ route('guests.create') }}"
                                class="block px-6 py-3 bg-white text-purple-600 font-semibold rounded-lg shadow-md hover:bg-gray-100 transition">
                                Add Guest
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-24 bg-gradient-to-r from-blue-50 to-green-50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-extrabold text-center text-gray-800 mb-16">Your Dashboard</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-12">
                <!-- Event Stats Card -->
                <div
                    class="mt-6 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg shadow-xl p-6 transform hover:scale-105 transition-all duration-300 ease-in-out">
                    <div class="text-center space-y-6">
                        <div class="flex items-center justify-center w-16 h-16 bg-white rounded-full shadow-lg mb-6">
                            <i class="fas fa-calendar-alt text-blue-600 text-3xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white">Events</h4>
                        <div class="text-5xl font-extrabold text-white">{{ $eventStats['total'] }}</div>
                        <p class="text-gray-200 mt-2">Track all your events in one place.</p>
                        <div class="mt-6 text-sm">
                            <div class="flex justify-between text-gray-100">
                                <span class="text-green-300">{{ $eventStats['active'] }} Active</span>
                                <span class="text-purple-300">{{ $eventStats['upcoming'] }} Upcoming</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Guest Stats Card -->
                <div
                    class="mt-6 bg-gradient-to-r from-green-500 to-teal-600 rounded-lg shadow-xl p-6 transform hover:scale-105 transition-all duration-300 ease-in-out">
                    <div class="text-center space-y-6">
                        <div class="flex items-center justify-center w-16 h-16 bg-white rounded-full shadow-lg mb-6">
                            <i class="fas fa-users text-green-600 text-3xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white">Guests</h4>
                        <div class="text-5xl font-extrabold text-white">{{ $guestStats['total'] }}</div>
                        <p class="text-gray-200 mt-2">Monitor guest attendance and engagement.</p>
                        <div class="mt-6 text-sm">
                            <div class="flex justify-between text-gray-100">
                                <span class="text-yellow-300">{{ $guestStats['pending'] }} Pending</span>
                                <span class="text-green-300">{{ $guestStats['confirmed'] }} Confirmed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Get Started Quickly -->
            <div
                class="mt-16 bg-gradient-to-r from-gray-700 to-gray-900 rounded-lg shadow-xl p-12 transform hover:scale-105 transition-all duration-300 ease-in-out">
                <div class="text-center space-y-6">
                    <div class="flex items-center justify-center w-16 h-16 bg-gray-800 rounded-full shadow-lg mb-6">
                        <i class="fas fa-bolt text-white text-3xl"></i>
                    </div>
                    <h4 class="text-2xl font-semibold text-white">Get Started Quickly</h4>
                    <p class="text-sm text-gray-400">Easily manage your events and guests with these shortcuts.</p>
                    <div class="flex justify-center space-x-6 mt-8">
                        <a href="{{ route('events.create') }}"
                            class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transform hover:scale-105 transition-all duration-300 ease-in-out">
                            Create New Event
                        </a>
                        <a href="{{ route('guests.create') }}"
                            class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-green-700 transform hover:scale-105 transition-all duration-300 ease-in-out">
                            Add New Guest
                        </a>
                        <a href="{{ route('events.index') }}"
                            class="px-6 py-3 bg-gray-600 text-white rounded-md hover:bg-gray-700 transform hover:scale-105 transition-all duration-300 ease-in-out">
                            View All Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Upcoming Events Section -->
    <!-- Modern Footer -->
    <footer class="bg-gray-900 text-white relative py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Footer Top Section: Logo and Social Links -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-12 space-y-6 md:space-y-0">
                <!-- Logo Section -->
                <div class="flex items-center space-x-4 animate__animated animate__fadeInUp">
                    <div
                        class="w-14 h-14 bg-yellow-500 rounded-full flex items-center justify-center shadow-xl transform hover:scale-110 transition-all duration-300">
                        <i class="fas fa-calendar-alt text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-white text-2xl font-semibold">Social Event Management</h3>
                        <p class="text-gray-300 text-sm">Creating Unforgettable Moments</p>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="flex space-x-6 animate__animated animate__fadeInUp">
                    <a href="#"
                        class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center transition-transform transform hover:scale-110 hover:bg-gray-800 duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center transition-transform transform hover:scale-110 hover:bg-gray-800 duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center transition-transform transform hover:scale-110 hover:bg-gray-800 duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center transition-transform transform hover:scale-110 hover:bg-gray-800 duration-300">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Footer Middle Section: Quick Links & Contact Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Quick Links -->
                <div class="space-y-4 animate__animated animate__fadeInUp">
                    <h4 class="text-white text-lg font-semibold">Quick Links</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li><a href="{{ route('events.index') }}"
                                class="hover:text-yellow-500 transition duration-300">Events</a></li>
                        <li><a href="{{ route('guests.index') }}"
                                class="hover:text-yellow-500 transition duration-300">Guests</a></li>
                        <li><a href="#" class="hover:text-yellow-500 transition duration-300">About Us</a></li>
                        <li><a href="#" class="hover:text-yellow-500 transition duration-300">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="space-y-4 animate__animated animate__fadeInUp">
                    <h4 class="text-white text-lg font-semibold">Contact Info</h4>
                    <ul class="space-y-3 text-gray-300">
                        <li><i class="fas fa-envelope text-yellow-500 mr-2"></i> aryasanya55@gmail.com</li>
                        <li><i class="fas fa-phone text-yellow-500 mr-2"></i> +91 9128985001</li>
                        <li><i class="fas fa-map-marker-alt text-yellow-500 mr-2"></i> Phagwara, Punjab</li>
                    </ul>
                </div>

                <!-- Newsletter Subscription -->
                <div class="lg:col-span-2 space-y-6 animate__animated animate__fadeInUp">
                    <h4 class="text-white text-lg font-semibold">Join Our Community</h4>
                    <p class="text-gray-300">Get the latest updates and tips for successful event planning.</p>
                    <form class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                        <input type="email" placeholder="Enter your email"
                            class="flex-1 bg-white text-black rounded-lg px-6 py-3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <button type="submit"
                            class="bg-yellow-500 text-white px-8 py-3 rounded-lg shadow-md hover:bg-yellow-400 transition-all duration-300 mt-4 md:mt-0">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>

            <!-- Footer Bottom Section: Privacy, Terms & Copyright -->
            <div
                class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <p class="text-gray-300 text-sm">&copy; {{ date('Y') }} Social Event Management. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-300 hover:text-white text-sm transition duration-300">Privacy
                        Policy</a>
                    <a href="#" class="text-gray-300 hover:text-white text-sm transition duration-300">Terms of
                        Service</a>
                    <a href="#" class="text-gray-300 hover:text-white text-sm transition duration-300">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>


</x-app-layout>