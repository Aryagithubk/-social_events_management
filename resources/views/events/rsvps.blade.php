<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center animate-fade-in-down">
            <h2 class="font-bold text-2xl text-gray-800 tracking-wide">
                {{ __('RSVP Dashboard for') }} <span class="text-indigo-600">{{ $event->title }}</span>
            </h2>
            <a href="{{ route('events.show', $event) }}" class="text-indigo-500 hover:text-indigo-700 font-semibold transition duration-300">
                ← Back to Event
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl p-8 animate-fade-in-up">
                <div class="mb-10">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 border-b pb-2">RSVP Summary</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        @php
                            $statuses = [
                                'accepted' => ['color' => 'green'],
                                'declined' => ['color' => 'red'],
                                'pending' => ['color' => 'yellow'],
                                'maybe' => ['color' => 'blue'],
                            ];
                        @endphp

                        @foreach($statuses as $status => $info)
                            <div class="bg-{{ $info['color'] }}-100 hover:scale-105 transform transition duration-300 rounded-lg p-6 flex flex-col items-center justify-center">
                                <p class="text-sm font-medium text-{{ $info['color'] }}-800 uppercase">{{ ucfirst($status) }}</p>
                                <p class="text-3xl font-bold text-{{ $info['color'] }}-800 mt-2">
                                    {{ $event->rsvps->where('status', $status)->count() }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-6 border-b pb-2">All Guest Responses</h3>
                    <div class="overflow-x-auto rounded-lg shadow-md">
                        <table class="min-w-full table-auto divide-y divide-gray-200">
                            <thead class="bg-indigo-50">
                                <tr class="text-gray-700 text-sm uppercase tracking-wider">
                                    <th class="px-6 py-4 text-left">Guest</th>
                                    <th class="px-6 py-4 text-left">Email</th>
                                    <th class="px-6 py-4 text-left">Status</th>
                                    <th class="px-6 py-4 text-left">Guests #</th>
                                    <th class="px-6 py-4 text-left">Special Request</th>
                                    <th class="px-6 py-4 text-left">Update</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @foreach($rsvps as $rsvp)
                                    <tr class="hover:bg-gray-50 transition duration-300">
                                        <td class="px-6 py-4">
                                            <div class="text-base font-semibold text-gray-800">{{ $rsvp->guest->name }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-600">{{ $rsvp->guest->email }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                                @if($rsvp->status === 'accepted') bg-green-200 text-green-800
                                                @elseif($rsvp->status === 'declined') bg-red-200 text-red-800
                                                @elseif($rsvp->status === 'pending') bg-yellow-200 text-yellow-800
                                                @else bg-blue-200 text-blue-800 @endif">
                                                {{ ucfirst($rsvp->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $rsvp->number_of_guests }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $rsvp->special_requests ?? 'None' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('rsvps.update-status', ['rsvp' => $rsvp->id]) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" onchange="this.form.submit()" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm transition">
                                                    <option value="pending" {{ $rsvp->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="accepted" {{ $rsvp->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                    <option value="declined" {{ $rsvp->status === 'declined' ? 'selected' : '' }}>Declined</option>
                                                    <option value="maybe" {{ $rsvp->status === 'maybe' ? 'selected' : '' }}>Maybe</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8">
                        {{ $rsvps->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in-up {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-down { animation: fade-in-down 0.6s ease-out both; }
        .animate-fade-in-up { animation: fade-in-up 0.6s ease-out both; }
    </style>
</x-app-layout>
