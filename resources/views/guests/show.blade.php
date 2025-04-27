<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-3xl text-gray-900 leading-tight animate__animated animate__fadeIn">
                {{ $guest->name }}
            </h2>
            <div class="space-x-4">
                <a href="{{ route('guests.edit', $guest) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-5 rounded-full shadow-lg transform transition-all hover:scale-105">
                    Edit Guest
                </a>
                <a href="{{ route('guests.index') }}" class="text-gray-700 hover:text-gray-900 font-semibold">
                    Back to Guests
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl p-8 space-y-10">
                <!-- Guest Information Section -->
                <div class="flex flex-col md:flex-row gap-10">
                    <div class="flex-1">
                        <h3 class="text-2xl font-semibold mb-6 text-gray-800">Guest Information</h3>
                        <div class="space-y-6">
                            <div class="p-6 bg-gray-100 rounded-lg shadow-md hover:shadow-xl transform transition-all hover:scale-105">
                                <p class="text-sm text-gray-600">Email</p>
                                <p class="mt-1 text-xl font-medium text-gray-800">{{ $guest->email }}</p>
                            </div>
                            <div class="p-6 bg-gray-100 rounded-lg shadow-md hover:shadow-xl transform transition-all hover:scale-105">
                                <p class="text-sm text-gray-600">Phone</p>
                                <p class="mt-1 text-xl font-medium text-gray-800">{{ $guest->phone ?? 'N/A' }}</p>
                            </div>
                            <div class="p-6 bg-gray-100 rounded-lg shadow-md hover:shadow-xl transform transition-all hover:scale-105">
                                <p class="text-sm text-gray-600">Notes</p>
                                <p class="mt-1 text-xl font-medium text-gray-800">{{ $guest->notes ?? 'No notes available' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Event Attendance Section -->
                    <div class="flex-1">
                        <h3 class="text-2xl font-semibold mb-6 text-gray-800">Event Attendance</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="bg-green-100 p-8 rounded-xl shadow-lg hover:shadow-xl transform transition-all hover:scale-105">
                                <p class="text-lg text-green-700 font-medium">Accepted</p>
                                <p class="text-4xl font-semibold text-green-700">{{ $guest->events->where('pivot.status', 'accepted')->count() }}</p>
                            </div>
                            <div class="bg-red-100 p-8 rounded-xl shadow-lg hover:shadow-xl transform transition-all hover:scale-105">
                                <p class="text-lg text-red-700 font-medium">Declined</p>
                                <p class="text-4xl font-semibold text-red-700">{{ $guest->events->where('pivot.status', 'declined')->count() }}</p>
                            </div>
                            <div class="bg-yellow-100 p-8 rounded-xl shadow-lg hover:shadow-xl transform transition-all hover:scale-105">
                                <p class="text-lg text-yellow-700 font-medium">Pending</p>
                                <p class="text-4xl font-semibold text-yellow-700">{{ $guest->events->where('pivot.status', 'pending')->count() }}</p>
                            </div>
                            <div class="bg-blue-100 p-8 rounded-xl shadow-lg hover:shadow-xl transform transition-all hover:scale-105">
                                <p class="text-lg text-blue-700 font-medium">Maybe</p>
                                <p class="text-4xl font-semibold text-blue-700">{{ $guest->events->where('pivot.status', 'maybe')->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Events Section -->
                <div>
                    <h3 class="text-2xl font-semibold mb-6 text-gray-800">Recent Events</h3>
                    <div class="space-y-4">
                        @foreach($events->take(5) as $event)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl shadow-sm hover:shadow-md transform transition-all hover:scale-105">
                                <div class="space-y-1">
                                    <p class="text-lg font-medium text-gray-900">{{ $event->title }}</p>
                                    <p class="text-sm text-gray-500">{{ $event->start_date->format('M d, Y') }}</p>
                                </div>
                                <span class="px-4 py-2 rounded-full text-xs 
                                    @if($event->pivot->status === 'accepted') bg-green-100 text-green-700
                                    @elseif($event->pivot->status === 'declined') bg-red-100 text-red-700
                                    @elseif($event->pivot->status === 'pending') bg-yellow-100 text-yellow-700
                                    @else bg-blue-100 text-blue-700 @endif">
                                    {{ ucfirst($event->pivot->status) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                    @if($events->count() > 5)
                        <div class="mt-6 text-center">
                            <a href="#" class="text-blue-500 hover:text-blue-700 transition-all">
                                View All Events
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
