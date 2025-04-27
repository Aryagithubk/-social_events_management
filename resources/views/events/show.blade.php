<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate-fade-in-down">
            <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">
                {{ $event->title }}
            </h2>
            <div class="flex space-x-4">
                <a href="{{ route('events.edit', $event) }}" 
                   class="bg-yellow-500 text-white font-medium py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:bg-yellow-400">
                    Edit Event
                </a>
                <a href="{{ route('events.guests', $event) }}" 
                   class="bg-blue-500 text-white font-medium py-3 px-6 rounded-xl transition-all duration-300 transform hover:scale-105 hover:bg-blue-400">
                    Manage Guests
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-in-up">
            <div class="bg-white shadow-2xl rounded-3xl overflow-hidden p-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                    <!-- Event Details Section -->
                    <div class="space-y-8 animate-slide-up">
                        <h3 class="text-2xl font-extrabold text-gray-800">Event Details</h3>
                        <div class="space-y-6">
                            <div class="flex flex-col bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                                <p class="text-sm text-gray-500">Description</p>
                                <p class="font-medium text-gray-700">{{ $event->description }}</p>
                            </div>

                            <div class="flex flex-col bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                                <p class="text-sm text-gray-500">Date & Time</p>
                                <p class="font-medium text-gray-700">
                                    {{ $event->start_date->format('F j, Y g:i A') }} → 
                                    {{ $event->end_date->format('F j, Y g:i A') }}
                                </p>
                            </div>

                            <div class="flex flex-col bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                                <p class="text-sm text-gray-500">Location</p>
                                <p class="font-medium text-gray-700">{{ $event->location }}</p>
                            </div>

                            <div class="flex flex-col bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                                <p class="text-sm text-gray-500">Max Guests</p>
                                <p class="font-medium text-gray-700">{{ $event->max_guests ?? 'No limit' }}</p>
                            </div>

                            <div class="flex flex-col bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                                <p class="text-sm text-gray-500">Status</p>
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                                    @if($event->status === 'upcoming') bg-blue-100 text-blue-800
                                    @elseif($event->status === 'ongoing') bg-green-100 text-green-800
                                    @elseif($event->status === 'completed') bg-gray-200 text-gray-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($event->status) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- RSVP Summary Section -->
                    <div class="space-y-8 animate-slide-left">
                        <h3 class="text-2xl font-extrabold text-gray-800">RSVP Summary</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <div class="bg-green-100 p-6 rounded-2xl shadow-lg hover:shadow-xl text-center transition-all duration-300">
                                <p class="text-green-800 font-medium text-sm">Accepted</p>
                                <p class="text-3xl font-extrabold text-green-800">{{ $event->rsvps->where('status', 'accepted')->count() }}</p>
                            </div>
                            <div class="bg-red-100 p-6 rounded-2xl shadow-lg hover:shadow-xl text-center transition-all duration-300">
                                <p class="text-red-800 font-medium text-sm">Declined</p>
                                <p class="text-3xl font-extrabold text-red-800">{{ $event->rsvps->where('status', 'declined')->count() }}</p>
                            </div>
                            <div class="bg-yellow-100 p-6 rounded-2xl shadow-lg hover:shadow-xl text-center transition-all duration-300">
                                <p class="text-yellow-800 font-medium text-sm">Pending</p>
                                <p class="text-3xl font-extrabold text-yellow-800">{{ $event->rsvps->where('status', 'pending')->count() }}</p>
                            </div>
                            <div class="bg-blue-100 p-6 rounded-2xl shadow-lg hover:shadow-xl text-center transition-all duration-300">
                                <p class="text-blue-800 font-medium text-sm">Maybe</p>
                                <p class="text-3xl font-extrabold text-blue-800">{{ $event->rsvps->where('status', 'maybe')->count() }}</p>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h3 class="text-lg font-extrabold text-gray-800">Recent RSVPs</h3>
                            <div class="space-y-4">
                                @foreach($rsvps->take(5) as $rsvp)
                                    <div class="flex justify-between items-center bg-gray-50 p-5 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300">
                                        <div>
                                            <p class="text-lg font-semibold">{{ $rsvp->guest->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $rsvp->guest->email }}</p>
                                        </div>
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-xs font-medium
                                            @if($rsvp->status === 'accepted') bg-green-200 text-green-800
                                            @elseif($rsvp->status === 'declined') bg-red-200 text-red-800
                                            @elseif($rsvp->status === 'pending') bg-yellow-200 text-yellow-800
                                            @else bg-blue-200 text-blue-800 @endif">
                                            {{ ucfirst($rsvp->status) }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                            @if($rsvps->count() > 5)
                                <div class="mt-4 text-center">
                                    <a href="{{ route('events.rsvps', $event) }}" class="text-blue-600 hover:text-blue-800 font-semibold transition-all duration-300">
                                        View All RSVPs
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
