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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- TailwindCSS Animations -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body class="font-sans bg-gradient-to-t from-blue-100 via-white to-blue-200 min-h-screen flex flex-col">

    <div class="flex-1">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow-lg fade-in py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">
                    <h2 class="font-semibold text-xl text-gray-800">{{ $header }}</h2>
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Success Alert -->
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-3 rounded-lg mb-6 shadow-lg transform transition-all hover:scale-105 duration-300 fade-in">
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Error Alert -->
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-3 rounded-lg mb-6 shadow-lg transform transition-all hover:scale-105 duration-300 fade-in">
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                <!-- Content Slot -->
                <div class="bg-white shadow-lg rounded-lg p-8 space-y-6 fade-in">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <x-footer class="mt-12 bg-gray-900 text-white py-6 text-center fade-in" />

    <script>
        // TailwindCSS Transition on Hover
        const elements = document.querySelectorAll('.hover-scale');
        elements.forEach((el) => {
            el.addEventListener('mouseenter', () => {
                el.classList.add('scale-105');
            });
            el.addEventListener('mouseleave', () => {
                el.classList.remove('scale-105');
            });
        });
    </script>
</body>
</html>
