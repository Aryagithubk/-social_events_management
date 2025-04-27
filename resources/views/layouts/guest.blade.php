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

    <!-- TailwindCSS Animations -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
    </style>
</head>
<body class="font-sans bg-gradient-to-t from-blue-200 via-white to-blue-300 min-h-screen flex flex-col justify-center items-center">

    <!-- Container for Content -->
    <div class="flex-1 w-full flex items-center justify-center">
        <div class="max-w-md w-full p-8 bg-white rounded-lg shadow-lg transform transition-all hover:scale-105 duration-300 fade-in">

            <!-- Logo Section -->
            <div class="flex justify-center mb-8">
                <a href="/">
                    <x-application-logo size="large" class="mx-auto text-blue-600" />
                </a>
            </div>

            <!-- Form/Slot Content -->
            <div class="space-y-6">
                <div class="bg-gray-50 p-6 rounded-lg shadow-md border border-gray-200">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </div>

</body>
</html>
