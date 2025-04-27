<!-- Modern Footer -->
<footer class="bg-gray-900 text-white relative py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Footer Top Section: Logo and Social Links -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 space-y-6 md:space-y-0">
            <!-- Logo Section -->
            <div class="flex items-center space-x-4 animate__animated animate__fadeInUp">
                <div class="w-14 h-14 bg-yellow-500 rounded-full flex items-center justify-center shadow-xl transform hover:scale-110 transition-all duration-300">
                    <i class="fas fa-calendar-alt text-white text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-white text-2xl font-semibold">Social Event Management</h3>
                    <p class="text-gray-300 text-sm">Creating Unforgettable Moments</p>
                </div>
            </div>

            <!-- Social Links -->
            <div class="flex space-x-6 animate__animated animate__fadeInUp">
                <a href="#" class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center transition-transform transform hover:scale-110 hover:bg-gray-800 duration-300">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center transition-transform transform hover:scale-110 hover:bg-gray-800 duration-300">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center transition-transform transform hover:scale-110 hover:bg-gray-800 duration-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-black text-white rounded-full flex items-center justify-center transition-transform transform hover:scale-110 hover:bg-gray-800 duration-300">
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
                    <li><a href="{{ route('events.index') }}" class="hover:text-yellow-500 transition duration-300">Events</a></li>
                    <li><a href="{{ route('guests.index') }}" class="hover:text-yellow-500 transition duration-300">Guests</a></li>
                    <li><a href="#" class="hover:text-yellow-500 transition duration-300">About Us</a></li>
                    <li><a href="#" class="hover:text-yellow-500 transition duration-300">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="space-y-4 animate__animated animate__fadeInUp">
                <h4 class="text-white text-lg font-semibold">Contact Info</h4>
                <ul class="space-y-3 text-gray-300">
                    <li><i class="fas fa-envelope text-yellow-500 mr-2"></i> info@events.com</li>
                    <li><i class="fas fa-phone text-yellow-500 mr-2"></i> (555) 123-4567</li>
                    <li><i class="fas fa-map-marker-alt text-yellow-500 mr-2"></i> 123 Event Street, City</li>
                </ul>
            </div>

            <!-- Newsletter Subscription -->
            <div class="lg:col-span-2 space-y-6 animate__animated animate__fadeInUp">
                <h4 class="text-white text-lg font-semibold">Subscribe to Our Newsletter</h4>
                <p class="text-gray-300">Stay updated with our latest events and features.</p>
                <form class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                    <input 
                        type="email" 
                        placeholder="Enter your email" 
                        class="flex-1 bg-white text-black rounded-lg px-6 py-3 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                    >
                    <button 
                        type="submit" 
                        class="bg-yellow-500 text-white px-8 py-3 rounded-lg shadow-md hover:bg-yellow-400 transition-all duration-300 mt-4 md:mt-0">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer Bottom Section: Privacy, Terms & Copyright -->
        <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <p class="text-gray-300 text-sm">&copy; {{ date('Y') }} Social Event Management. All rights reserved.</p>
            <div class="flex space-x-6">
                <a href="#" class="text-gray-300 hover:text-white text-sm transition duration-300">Privacy Policy</a>
                <a href="#" class="text-gray-300 hover:text-white text-sm transition duration-300">Terms of Service</a>
                <a href="#" class="text-gray-300 hover:text-white text-sm transition duration-300">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>
