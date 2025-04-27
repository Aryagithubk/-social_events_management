<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600">
        <div class="w-full sm:max-w-md p-8 bg-white rounded-lg shadow-xl transform transition duration-500 hover:scale-105 hover:shadow-2xl">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-semibold text-purple-800">Welcome to the Event Portal</h2>
                <p class="mt-2 text-lg text-gray-600">Access your RSVP invitations easily.</p>
            </div>

            @if (session('status'))
                <div class="mb-4 text-sm text-green-600 font-medium text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('guest.login') }}" class="space-y-6">
                @csrf
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="block text-gray-700 font-semibold mb-2" />
                    <x-text-input 
                        id="email" 
                        class="block w-full p-4 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-md transition-all ease-in-out duration-300" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <div class="flex justify-end">
                    <x-primary-button class="w-full bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition duration-300">
                        {{ __('Access RSVPs') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-500">By continuing, you agree to our <a href="#" class="text-indigo-600 hover:underline">Terms and Conditions</a>.</p>
            </div>
        </div>
    </div>
</x-guest-layout>
