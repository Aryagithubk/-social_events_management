<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-purple-400 to-indigo-600">
        <div class="w-full sm:max-w-lg p-8 bg-white rounded-3xl shadow-xl transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-indigo-700">Almost There!</h2>
                <p class="mt-2 text-lg text-gray-600">Before getting started, please verify your email address by clicking on the link we just sent you.</p>
            </div>

            <!-- Verification Link Sent Confirmation -->
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 text-center">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 flex flex-col items-center space-y-6">
                <!-- Resend Verification Email Button -->
                <form method="POST" action="{{ route('verification.send') }}" class="w-full flex justify-center">
                    @csrf
                    <div>
                        <x-primary-button class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:scale-105 transition ease-in-out duration-300">
                            {{ __('Resend Verification Email') }}
                        </x-primary-button>
                    </div>
                </form>

                <!-- Log Out Button -->
                <form method="POST" action="{{ route('logout') }}" class="w-full flex justify-center">
                    @csrf
                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
