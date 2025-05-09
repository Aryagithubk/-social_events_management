<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
        <nav class="bg-gradient-to-r from-blue-600 to-purple-600 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <div class="flex items-center space-x-6">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="h-16 w-16 animate-bounce text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex">
                    <div class="px-4 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-110 hover:bg-blue-500">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white text-base font-semibold">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </div>
                    <div class="px-4 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-110 hover:bg-blue-500">
                        <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.*')" class="text-white text-base font-semibold">
                            {{ __('Events') }}
                        </x-nav-link>
                    </div>
                    <div class="px-4 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-110 hover:bg-blue-500">
                        <x-nav-link :href="route('guests.index')" :active="request()->routeIs('guests.*')" class="text-white text-base font-semibold">
                            {{ __('Guests') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center space-x-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-base font-semibold rounded-md text-white transition duration-300 ease-in-out transform hover:scale-110 hover:bg-blue-500">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ml-2">
                                <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Menu -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white transition duration-300 ease-in-out transform hover:scale-110 hover:bg-blue-500 focus:outline-none focus:bg-blue-700">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-gradient-to-r from-blue-600 to-purple-600">
        <div class="pt-4 pb-3 space-y-1">
            <div class="px-4 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 hover:bg-blue-500">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white text-base font-semibold">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>
            <div class="px-4 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 hover:bg-blue-500">
                <x-responsive-nav-link :href="route('events.index')" :active="request()->routeIs('events.*')" class="text-white text-base font-semibold">
                    {{ __('Events') }}
                </x-responsive-nav-link>
            </div>
            <div class="px-4 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 hover:bg-blue-500">
                <x-responsive-nav-link :href="route('guests.index')" :active="request()->routeIs('guests.*')" class="text-white text-base font-semibold">
                    {{ __('Guests') }}
                </x-responsive-nav-link>
            </div>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-blue-400">
            <div class="px-4">
                <div class="font-semibold text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-blue-200">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <div class="px-4 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 hover:bg-blue-500">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-white text-base font-semibold">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="px-4 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-105 hover:bg-blue-500">
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-white text-base font-semibold">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>




            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> 