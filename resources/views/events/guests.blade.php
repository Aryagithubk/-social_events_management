<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Guest Management for ') }} "{{ $event->title }}"
            </h2>
            <a href="{{ route('events.show', $event) }}" class="text-indigo-600 hover:text-indigo-800 transition-colors">
                ← Back to Event
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="space-y-10">
                
                {{-- Filter Guests --}}
                <div class="bg-white rounded-2xl shadow-lg p-8 animate-fadeIn">
                    <h3 class="text-xl font-semibold mb-6 text-indigo-700">🎯 Filter Guests</h3>
                    <form method="GET" action="{{ route('events.guests', $event) }}" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="search" :value="__('Search Guests')" />
                                <x-text-input id="search" name="search" type="text" 
                                    class="mt-2 w-full py-3 px-4 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-xl shadow-sm transition-all duration-300" 
                                    :value="request('search')" placeholder="Enter guest name or email..." />
                            </div>
                            <div>
                                <x-input-label for="status" :value="__('RSVP Status')" />
                                <select id="status" name="status" 
                                    class="mt-2 w-full py-3 px-4 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-xl shadow-sm transition-all duration-300">
                                    <option value="">All Statuses</option>
                                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="accepted" {{ request('status') === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="declined" {{ request('status') === 'declined' ? 'selected' : '' }}>Declined</option>
                                    <option value="maybe" {{ request('status') === 'maybe' ? 'selected' : '' }}>Maybe</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button class="py-2 px-6">{{ __('Apply Filters') }}</x-primary-button>
                            <a href="{{ route('events.guests', $event) }}" class="inline-flex items-center px-6 py-2 bg-gray-700 text-white text-sm font-medium rounded-xl hover:bg-gray-600 transition-all">
                                {{ __('Clear') }}
                            </a>
                        </div>
                    </form>
                </div>

                {{-- Invite Guests --}}
                <div class="bg-white rounded-2xl shadow-lg p-8 animate-fadeIn">
                    <h3 class="text-xl font-semibold mb-6 text-indigo-700">✉️ Invite New Guests</h3>
                    <form method="POST" action="{{ route('events.invite', $event) }}" class="space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="guest_ids" :value="__('Select Guests to Invite')" />
                            <select id="guest_ids" name="guest_ids[]" multiple 
                                class="mt-2 w-full py-3 px-4 border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-xl shadow-sm transition-all">
                                @foreach(App\Models\Guest::whereNotIn('id', $event->guests->pluck('id'))->get() as $guest)
                                    <option value="{{ $guest->id }}">{{ $guest->name }} ({{ $guest->email }})</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('guest_ids')" />
                        </div>
                        <x-primary-button class="py-3 px-8 text-lg">{{ __('Send Invitations') }}</x-primary-button>
                    </form>
                </div>

                {{-- Current Guests --}}
                <div class="bg-white rounded-2xl shadow-lg p-8 animate-fadeIn">
                    <h3 class="text-xl font-semibold mb-6 text-indigo-700">📋 Current Guest List</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 rounded-xl overflow-hidden">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Name</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Email</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Status</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700"># Guests</th>
                                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($guests as $guest)
                                    <tr class="hover:bg-gray-50 transition-all duration-300">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $guest->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $guest->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                                @if($guest->pivot->status === 'accepted') bg-green-100 text-green-800
                                                @elseif($guest->pivot->status === 'declined') bg-red-100 text-red-800
                                                @elseif($guest->pivot->status === 'pending') bg-yellow-100 text-yellow-800
                                                @else bg-blue-100 text-blue-800 @endif">
                                                {{ ucfirst($guest->pivot->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $guest->pivot->number_of_guests }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @php
                                                $rsvp = $guest->rsvps->where('event_id', $event->id)->first();
                                            @endphp
                                            @if($rsvp)
                                                <form action="{{ route('rsvps.update-status', ['rsvp' => $rsvp->id]) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status" onchange="this.form.submit()" 
                                                        class="py-1 px-2 text-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg shadow-sm transition-all">
                                                        <option value="pending" {{ $rsvp->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="accepted" {{ $rsvp->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                        <option value="declined" {{ $rsvp->status === 'declined' ? 'selected' : '' }}>Declined</option>
                                                        <option value="maybe" {{ $rsvp->status === 'maybe' ? 'selected' : '' }}>Maybe</option>
                                                    </select>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-8 flex justify-center">
                        {{ $guests->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Simple fade-in animation --}}
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out both;
        }
    </style>
</x-app-layout>
