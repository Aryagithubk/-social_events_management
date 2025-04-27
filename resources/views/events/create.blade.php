<x-app-layout>
    <x-slot name="header">
        <h2 class="text-4xl font-extrabold text-indigo-700 animate-slide-down tracking-wide">
            {{ __('🎉 Create an Amazing Event') }}
        </h2>
    </x-slot>

    <div class="py-16">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">
            <div class="bg-white bg-opacity-90 backdrop-blur-md shadow-2xl rounded-3xl p-10 animate-fade-in">
                <form method="POST" action="{{ route('events.store') }}" class="space-y-10">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="flex flex-col space-y-3">
                            <x-input-label for="title" :value="__('Event Title')" class="text-xl font-semibold text-indigo-600" />
                            <x-text-input 
                                id="title" 
                                name="title" 
                                type="text" 
                                class="block w-full rounded-2xl p-4 text-lg border-gray-300 focus:ring-4 focus:ring-indigo-300 transition-all" 
                                :value="old('title')" 
                                required autofocus
                            />
                            <x-input-error class="text-red-500 text-sm" :messages="$errors->get('title')" />
                        </div>

                        <div class="flex flex-col space-y-3">
                            <x-input-label for="location" :value="__('Location')" class="text-xl font-semibold text-indigo-600" />
                            <x-text-input 
                                id="location" 
                                name="location" 
                                type="text" 
                                class="block w-full rounded-2xl p-4 text-lg border-gray-300 focus:ring-4 focus:ring-indigo-300 transition-all" 
                                :value="old('location')" 
                                required
                            />
                            <x-input-error class="text-red-500 text-sm" :messages="$errors->get('location')" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-3">
    <x-input-label for="description" :value="__('Description')" class="text-xl font-semibold text-indigo-600" />
    <textarea 
        id="description" 
        name="description" 
        rows="6" 
        class="block w-full rounded-2xl p-4 text-lg border-2 border-gray-300 focus:ring-4 focus:ring-indigo-300 transition-all resize-none" 
        required
    >{{ old('description') }}</textarea>
    <x-input-error class="text-red-500 text-sm" :messages="$errors->get('description')" />
</div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        <div class="flex flex-col space-y-3">
                            <x-input-label for="start_date" :value="__('Start Date')" class="text-xl font-semibold text-indigo-600" />
                            <x-text-input 
                                id="start_date" 
                                name="start_date" 
                                type="datetime-local" 
                                class="block w-full rounded-2xl p-4 text-lg border-gray-300 focus:ring-4 focus:ring-indigo-300 transition-all" 
                                :value="old('start_date')" 
                                required
                            />
                            <x-input-error class="text-red-500 text-sm" :messages="$errors->get('start_date')" />
                        </div>

                        <div class="flex flex-col space-y-3">
                            <x-input-label for="end_date" :value="__('End Date')" class="text-xl font-semibold text-indigo-600" />
                            <x-text-input 
                                id="end_date" 
                                name="end_date" 
                                type="datetime-local" 
                                class="block w-full rounded-2xl p-4 text-lg border-gray-300 focus:ring-4 focus:ring-indigo-300 transition-all" 
                                :value="old('end_date')" 
                                required
                            />
                            <x-input-error class="text-red-500 text-sm" :messages="$errors->get('end_date')" />
                        </div>
                    </div>

                    <div class="flex flex-col space-y-3">
                        <x-input-label for="max_guests" :value="__('Maximum Guests')" class="text-xl font-semibold text-indigo-600" />
                        <x-text-input 
                            id="max_guests" 
                            name="max_guests" 
                            type="number" 
                            min="1" 
                            class="block w-full rounded-2xl p-4 text-lg border-gray-300 focus:ring-4 focus:ring-indigo-300 transition-all" 
                            :value="old('max_guests')" 
                        />
                        <x-input-error class="text-red-500 text-sm" :messages="$errors->get('max_guests')" />
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <x-primary-button class="bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white text-lg font-bold py-3 px-8 rounded-2xl transition-all transform hover:scale-105">
                            {{ __('🚀 Create Event') }}
                        </x-primary-button>

                        <a href="{{ route('events.index') }}" class="text-indigo-500 hover:text-indigo-700 text-lg font-semibold underline underline-offset-4 transition-all">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Custom Animations -->
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slide-down {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.7s ease-out both;
        }

        .animate-slide-down {
            animation: slide-down 0.7s ease-out both;
        }
    </style>
</x-app-layout>
