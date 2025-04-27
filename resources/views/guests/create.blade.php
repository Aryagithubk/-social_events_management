<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-900 leading-tight animate__animated animate__fadeIn">
            {{ __('Add Guest') }}
        </h2>
    </x-slot>

    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-8">
                <div class="text-gray-900">
                    <form method="POST" action="{{ route('guests.store') }}" class="space-y-8 animate__animated animate__fadeInUp">
                        @csrf

                        <div class="space-y-4">
                            <x-input-label for="name" :value="__('Name')" class="text-lg font-semibold" />
                            <x-text-input id="name" name="name" type="text" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-indigo-500 transition-all" :value="old('name')" required autofocus />
                            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('name')" />
                        </div>

                        <div class="space-y-4">
                            <x-input-label for="email" :value="__('Email')" class="text-lg font-semibold" />
                            <x-text-input id="email" name="email" type="email" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-indigo-500 transition-all" :value="old('email')" required />
                            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('email')" />
                        </div>

                        <div class="space-y-4">
                            <x-input-label for="phone" :value="__('Phone Number')" class="text-lg font-semibold" />
                            <x-text-input id="phone" name="phone" type="tel" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-indigo-500 transition-all" :value="old('phone')" />
                            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('phone')" />
                        </div>

                        <div class="space-y-4">
                            <x-input-label for="notes" :value="__('Notes')" class="text-lg font-semibold" />
                            <textarea id="notes" name="notes" class="w-full px-4 py-3 rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-indigo-500 transition-all" rows="4">{{ old('notes') }}</textarea>
                            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('notes')" />
                        </div>

                        <div class="flex items-center gap-8 mt-8">
                            <x-primary-button class="px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white transition-all duration-300">{{ __('Add Guest') }}</x-primary-button>
                            <a href="{{ route('guests.index') }}" class="text-indigo-600 hover:text-indigo-700 transition duration-300">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
