<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate-fadeIn">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Manage Events') }}
            </h2>
            <a href="{{ route('events.create') }}"
                class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg shadow-md transform hover:scale-105 transition-all duration-300 ease-in-out">
                + Create Event
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Events Section -->
            <div class="bg-white shadow-2xl rounded-lg p-8 animate-slideUp">
                <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-10">
                    @forelse ($events as $event)
                        <div class="relative p-6 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-500 ease-in-out
                            @if($event->status === 'upcoming') bg-gradient-to-r from-blue-500 via-purple-500 to-indigo-600 animate-gradient-x
                            @elseif($event->status === 'ongoing') bg-gradient-to-r from-green-500 via-teal-500 to-green-700 animate-gradient-x
                            @elseif($event->status === 'completed') bg-gradient-to-r from-gray-500 via-gray-600 to-gray-700 animate-gradient-x
                                @else bg-gradient-to-r from-blue-500 via-purple-500 to-green-700 animate-gradient-x
                            @endif">
                            <div class="flex flex-col h-full space-y-4">
                                <div class="flex flex-col items-center space-y-2">
                                    <h3 class="text-xl font-bold text-white hover:text-indigo-300 transition duration-300">
                                        {{ $event->title }}
                                    </h3>
                                    <p class="text-white text-sm mb-4">{{ Str::limit($event->description, 80) }}</p>
                                    <div class="flex flex-col text-sm text-white space-y-1 w-full">
                                        <p><span class="font-semibold">Date:</span>
                                            {{ $event->start_date->format('M d, Y') }}</p>
                                        <p><span class="font-semibold">Location:</span> {{ $event->location }}</p>
                                        <p><span class="font-semibold">Status:</span>
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                                                                                    @if($event->status === 'upcoming') bg-blue-100 text-blue-800
                                                                                                    @elseif($event->status === 'ongoing') bg-green-100 text-green-800
                                                                                                    @elseif($event->status === 'completed') bg-gray-100 text-gray-800
                                                                                                        @else bg-red-100 text-red-800
                                                                                                    @endif">
                                                {{ ucfirst($event->status) }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mt-6">
                                    <a href="{{ route('events.show', $event) }}"
                                        class="text-indigo-200 hover:text-indigo-400 text-sm font-medium transition duration-300">View</a>
                                    <div class="flex space-x-3">
                                        <a href="{{ route('events.edit', $event) }}"
                                            class="text-yellow-300 hover:text-yellow-400 text-sm font-medium transition duration-300">Edit</a>
                                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-300 hover:text-red-500 text-sm font-medium transition duration-300"
                                                onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center text-gray-500 text-lg">
                            No events found.
                        </div>
                    @endforelse
                </div>

                <!-- Pagination Section -->
                <div class="mt-8 flex justify-center">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Styles -->
    <style>
        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .animate-slideUp {
            animation: slideUp 0.6s ease-out;
        }

        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes gradient-x {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 3s ease infinite;
        }
    </style>
</x-app-layout>