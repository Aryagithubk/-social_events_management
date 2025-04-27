<nav x-data="{ open: false }" class="bg-gradient-to-r from-indigo-600 via-indigo-500 to-indigo-700 shadow-xl animate-fadeDown">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 hover:scale-110 transition-transform duration-300">
                <x-application-logo class="h-10 w-10 text-white" />
                <span class="text-white font-bold text-2xl tracking-wide hidden sm:inline-block">Eventify</span>
            </a>
        </div>

        <!-- Desktop Links -->
        <div class="hidden md:flex space-x-10 items-center">
            <a href="{{ route('dashboard') }}" class="text-white text-lg font-medium hover:text-indigo-300 transition duration-300 {{ request()->routeIs('dashboard') ? 'underline underline-offset-8' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('events.index') }}" class="text-white text-lg font-medium hover:text-indigo-300 transition duration-300 {{ request()->routeIs('events.*') ? 'underline underline-offset-8' : '' }}">
                Events
            </a>
            <a href="{{ route('guests.index') }}" class="text-white text-lg font-medium hover:text-indigo-300 transition duration-300 {{ request()->routeIs('guests.*') ? 'underline underline-offset-8' : '' }}">
                Guests
            </a>
        </div>

        <!-- User Profile Card -->
        <div class="hidden md:flex items-center space-x-3">
            <div class="bg-white/10 p-3 rounded-xl shadow-lg flex items-center space-x-3 hover:scale-105 transition-all duration-300">
                <div class="text-white">
                    <div class="font-semibold text-md">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-indigo-200">{{ Auth::user()->email }}</div>
                </div>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="focus:outline-none">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-indigo-700 hover:bg-indigo-100 transition">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-indigo-700 hover:bg-indigo-100 transition">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>

        <!-- Mobile Hamburger -->
        <div class="flex md:hidden">
            <button @click="open = !open" class="text-white hover:text-indigo-300 focus:outline-none transition-transform duration-300 transform hover:rotate-90">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown -->
    <div :class="{'block': open, 'hidden': !open}" class="md:hidden px-6 pb-6 animate-slideDown">
        <div class="bg-white/10 backdrop-blur-md rounded-xl py-4 mt-4 space-y-4 shadow-lg">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-white hover:bg-indigo-500 rounded-md transition">{{ __('Dashboard') }}</a>
            <a href="{{ route('events.index') }}" class="block px-4 py-2 text-white hover:bg-indigo-500 rounded-md transition">{{ __('Events') }}</a>
            <a href="{{ route('guests.index') }}" class="block px-4 py-2 text-white hover:bg-indigo-500 rounded-md transition">{{ __('Guests') }}</a>

            <div class="border-t border-indigo-200 mt-4 pt-4">
                <div class="text-white px-4">
                    <div class="font-semibold">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-indigo-200">{{ Auth::user()->email }}</div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-indigo-700 hover:bg-indigo-100 rounded-md transition">{{ __('Profile') }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-indigo-700 hover:bg-indigo-100 rounded-md transition">{{ __('Log Out') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Animations -->
    <style>
        @keyframes fadeDown {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideDown {
            0% { opacity: 0; transform: scaleY(0); }
            100% { opacity: 1; transform: scaleY(1); }
        }

        .animate-fadeDown {
            animation: fadeDown 0.5s ease-out;
        }

        .animate-slideDown {
            animation: slideDown 0.4s ease-in-out;
            transform-origin: top;
        }
    </style>
</nav>
