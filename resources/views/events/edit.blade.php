<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 leading-tight animate-fade-in-down">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen animate-fade-in">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white p-8 shadow-2xl rounded-3xl transition-all hover:shadow-3xl">
                <form method="POST" action="{{ route('events.update', $event) }}" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <div>
                            <label for="title" class="block text-lg font-semibold text-gray-700 mb-2">{{ __('Event Title') }}</label>
                            <input id="title" name="title" type="text" value="{{ old('title', $event->title) }}" required autofocus
                                class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-300 transition focus:outline-none" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <label for="description" class="block text-lg font-semibold text-gray-700 mb-2">{{ __('Description') }}</label>
                            <textarea id="description" name="description" rows="5" required
                                class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-300 transition focus:outline-none">{{ old('description', $event->description) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label for="start_date" class="block text-lg font-semibold text-gray-700 mb-2">{{ __('Start Date') }}</label>
                                <input id="start_date" name="start_date" type="datetime-local" value="{{ old('start_date', $event->start_date->format('Y-m-d\TH:i')) }}" required
                                    class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-300 transition focus:outline-none" />
                                <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                            </div>

                            <div>
                                <label for="end_date" class="block text-lg font-semibold text-gray-700 mb-2">{{ __('End Date') }}</label>
                                <input id="end_date" name="end_date" type="datetime-local" value="{{ old('end_date', $event->end_date->format('Y-m-d\TH:i')) }}" required
                                    class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-300 transition focus:outline-none" />
                                <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label for="location" class="block text-lg font-semibold text-gray-700 mb-2">{{ __('Location') }}</label>
                                <input id="location" name="location" type="text" value="{{ old('location', $event->location) }}" required
                                    class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-300 transition focus:outline-none" />
                                <x-input-error class="mt-2" :messages="$errors->get('location')" />
                            </div>

                            <div>
                                <label for="max_guests" class="block text-lg font-semibold text-gray-700 mb-2">{{ __('Maximum Guests') }}</label>
                                <input id="max_guests" name="max_guests" type="number" min="1" value="{{ old('max_guests', $event->max_guests) }}"
                                    class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-300 transition focus:outline-none" />
                                <x-input-error class="mt-2" :messages="$errors->get('max_guests')" />
                            </div>
                        </div>

                        <div>
                            <label for="status" class="block text-lg font-semibold text-gray-700 mb-2">{{ __('Status') }}</label>
                            <select id="status" name="status" required
                                class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-300 transition focus:outline-none">
                                <option value="upcoming" {{ old('status', $event->status) === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                <option value="ongoing" {{ old('status', $event->status) === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="completed" {{ old('status', $event->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ old('status', $event->status) === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('status')" />
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 pt-6">
                        <a href="{{ route('events.show', $event) }}"
                           class="px-6 py-3 rounded-xl text-gray-700 bg-gray-200 hover:bg-gray-300 transition-all text-lg font-semibold">
                            Cancel
                        </a>
                        <button type="submit"
                            class="px-6 py-3 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700 transition-all text-lg font-semibold">
                            {{ __('Update Event') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.6s ease-out both;
        }
        .animate-fade-in {
            animation: fade-in 1s ease-out both;
        }
    </style>
</x-app-layout>
