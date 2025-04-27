<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Social Event Management System') }}</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hero-pattern {
            background-image: url('{{ asset('images/landing.png') }}');
            background-position: center;
            /* background-size: cover;
                background-repeat: no-repeat; */
        }
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-gradient-to-r from-blue-600 to-purple-600 shadow-lg">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-24">
                    <!-- Logo and Title -->
                    <div class="flex items-center space-x-4">
                        <x-application-logo size="large" class="h-16 w-16 animate-bounce" />
                        <div>
                            <h1 class="text-3xl font-extrabold text-white tracking-wide">Social Event Management</h1>
                            <p class="text-sm text-gray-200">A platefor for connecting people through events</p>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex items-center space-x-6">
                        @auth
                            <a href="{{ route('dashboard') }}"
                                class="text-white hover:text-gray-200 px-4 py-2 rounded-md text-sm font-medium transition duration-300 transform hover:scale-110">
                                Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="text-white hover:text-gray-200 px-4 py-2 rounded-md text-sm font-medium transition duration-300 transform hover:scale-110">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-white hover:text-gray-200 px-4 py-2 rounded-md text-sm font-medium transition duration-300 transform hover:scale-110">
                                Log in
                            </a>
                            <a href="{{ route('register') }}"
                                class="bg-white text-blue-600 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-100 transition duration-300 transform hover:scale-110 shadow-md">
                                Register
                            </a>
                            <a href="{{ route('guest.login') }}"
                                class="text-white hover:text-gray-200 px-4 py-2 rounded-md text-sm font-medium transition duration-300 transform hover:scale-110">
                                Guest Login
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section with Background -->
        <div class="hero-pattern relative h-[100vh] bg-gradient-to-r from-blue-900 to-purple-900">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
                <div class="text-center text-white max-w-3xl mx-auto">
                    <h1 class="text-5xl md:text-7xl font-extrabold mb-6 animate-fade-in">
                        Effortless Event Management
                    </h1>
                    <p class="text-lg md:text-2xl mb-8 text-gray-300 animate-slide-up">
                        Streamline your event planning with tools designed for success..
                    </p>
                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('register') }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg font-semibold transition duration-300 transform hover:scale-105 shadow-lg">
                            Start Now
                        </a>
                        <a href="#features"
                            class="bg-gray-100 text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-200 transition duration-300 transform hover:scale-105">
                            Discover Features
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* Animations */
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slide-up {
                from {
                    opacity: 0;
                    transform: translateY(50px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fade-in 1s ease-out;
            }

            .animate-slide-up {
                animation: slide-up 1.2s ease-out;
            }

            .animate-bounce {
                animation: bounce 2s infinite;
            }

            @keyframes bounce {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-10px);
                }
            }
        </style>

        <!-- Features Section with Lottie -->
        <div id="features" class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">What Makes Us Unique?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <i class="fas fa-calendar-check text-blue-600 text-4xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Seamless Event Setup</h3>
                        <p class="text-gray-600">Design and organize events with ease using our user-friendly interface.
                        </p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <i class="fas fa-users text-purple-600 text-4xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Seamless Makes Us Unique</h3>
                        <p class="text-gray-600">Design and organize events with ease using our user-friendly
                            interface..</p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                        <i class="fas fa-chart-line text-green-600 text-4xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Actionable Insights</h3>
                        <p class="text-gray-600">Monitor event performance with real-time analytics and reports.</p>
                    </div>
                </div>
            </div>
        </div>

        <main>
            <div class="py-12 bg-gradient-to-r from-indigo-100 to-blue-200">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                        <div class="p-8 text-gray-900">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- Events Section -->
                                <div
                                    class="bg-blue-50 p-8 rounded-xl transform transition duration-500 hover:scale-105 hover:shadow-2xl hover:rotate-1 hover:translate-x-2">
                                    <h2 class="text-4xl font-extrabold text-blue-700 mb-6 animate-fade-up">Events</h2>
                                    <p class="text-lg text-gray-600 mb-6 animate-slide-up">
                                        Create and manage your events. Keep track of RSVPs and event details in one
                                        place.
                                    </p>
                                    @auth
                                        <a href="{{ route('events.index') }}"
                                            class="inline-flex items-center px-8 py-4 bg-blue-600 text-white font-semibold text-lg rounded-xl shadow-md hover:bg-blue-700 transition transform hover:scale-110">
                                            Explore Events
                                        </a>
                                    @else
                                        <p class="text-sm text-gray-500 mt-4 animate-fade-up">Log in to manage your events
                                        </p>
                                    @endauth
                                </div>

                                <!-- Guests Section -->
                                <div
                                    class="bg-red-50 p-8 rounded-xl transform transition duration-500 hover:scale-105 hover:shadow-2xl hover:rotate-1 hover:translate-x-2">
                                    <div
                                        class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mb-6">
                                        <i class="fas fa-users text-red-600 text-4xl"></i>
                                    </div>
                                    <h2 class="text-4xl font-extrabold text-red-700 mb-6 animate-fade-up">Guests</h2>
                                    <p class="text-lg text-gray-600 mb-6 animate-slide-up">
                                        Simplify guest management with tools to track attendance and engagement.
                                    </p>
                                    @auth
                                        <a href="{{ route('guests.index') }}"
                                            class="inline-flex items-center px-8 py-4 bg-red-600 text-white font-semibold text-lg rounded-xl shadow-md hover:bg-red-700 transition transform hover:scale-110">
                                            See Guest List
                                        </a>
                                    @else
                                        <p class="text-sm text-gray-500 mt-4 animate-fade-up">Log in to manage your guests
                                        </p>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <style>
            /* Animations */
            @keyframes fade-up {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slide-up {
                from {
                    opacity: 0;
                    transform: translateY(50px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-up {
                animation: fade-up 1s ease-out;
            }

            .animate-slide-up {
                animation: slide-up 1.2s ease-out;
            }
        </style>


        <footer class="bg-gradient-to-r from-gray-800 to-gray-900 text-gray-400">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- About Us Section -->
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-4">About Us</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Empowering you to create unforgettable events with our all-in-one management platform.
                        </p>
                    </div>

                    <!-- Quick Links Section -->
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-4">Quick Links</h3>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-gray-400 hover:text-blue-400 transition">About</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-blue-400 transition">Contact</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-blue-400 transition">FAQs</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-blue-400 transition">Terms</a></li>
                        </ul>
                    </div>

                    <!-- Contact Us Section -->
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-4">Contact Us</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center">
                                <i class="fas fa-envelope text-blue-400 mr-3"></i>
                                <span>aryasanya55@gmail.com</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-phone text-blue-400 mr-3"></i>
                                <span>+91 9128985001</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-map-marker-alt text-blue-400 mr-3"></i>
                                <span>Phagwara, Punjab</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Social Media Section -->
                <div class="mt-12 text-center">
                    <h3 class="text-xl font-bold text-white mb-4">Follow Us</h3>
                    <div class="flex justify-center space-x-6">
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                            <i class="fab fa-facebook-f text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                            <i class="fab fa-twitter text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                            <i class="fab fa-linkedin-in text-2xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Footer Bottom -->
                <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                    <p class="text-gray-500">&copy; {{ date('Y') }}Social Events Management. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>