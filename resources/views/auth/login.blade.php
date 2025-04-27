<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-purple-500 to-indigo-600">
        <div class="w-full sm:max-w-md p-8 bg-white rounded-2xl shadow-xl transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-indigo-700">Welcome Back!</h2>
                <p class="mt-2 text-lg text-gray-600">Please log in to your account.</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-center text-sm text-green-600" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="block text-gray-700 font-semibold" />
                    <x-text-input 
                        id="email" 
                        class="block w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-md transition duration-300 ease-in-out" 
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" 
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="block text-gray-700 font-semibold" />
                    <x-text-input 
                        id="password" 
                        class="block w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-md transition duration-300 ease-in-out" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password" 
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4 flex items-center">
                    <label for="remember_me" class="inline-flex items-center text-sm text-gray-600">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" 
                            name="remember" 
                        />
                        <span class="ml-2">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Forgot Password and Login Button -->
                <div class="flex justify-between items-center mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-indigo-600 hover:text-indigo-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition ease-in-out duration-300">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
