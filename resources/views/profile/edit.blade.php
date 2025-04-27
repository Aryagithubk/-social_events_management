<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 tracking-tight">
            {{ __('Profile Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Profile Update Section -->
            <div class="bg-gradient-to-r from-indigo-100 via-purple-100 to-pink-100 p-6 rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-800">Edit Profile</h3>
                    <p class="text-sm text-gray-600">Update your account details here</p>
                </div>

                @if (session('status') === 'profile-updated')
                    <div class="bg-green-100 text-green-800 p-3 mt-4 rounded-lg">
                        <p class="text-sm">{{ __('Profile updated successfully.') }}</p>
                    </div>
                @endif

                <form method="post" action="{{ route('profile.update') }}" class="space-y-6 mt-6">
                    @csrf
                    @method('patch')

                    <!-- Name Field -->
                    <div class="space-y-2">
                        <x-input-label for="name" :value="__('Full Name')" class="text-lg" />
                        <x-text-input id="name" name="name" type="text" class="block w-full p-4 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="text-xs text-red-600 mt-2" :messages="$errors->get('name')" />
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <x-input-label for="email" :value="__('Email Address')" class="text-lg" />
                        <x-text-input id="email" name="email" type="email" class="block w-full p-4 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500" :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error class="text-xs text-red-600 mt-2" :messages="$errors->get('email')" />
                    </div>

                    <!-- Password Fields -->
                    <div class="space-y-2">
                        <x-input-label for="current_password" :value="__('Current Password')" class="text-lg" />
                        <x-text-input id="current_password" name="current_password" type="password" class="block w-full p-4 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500" autocomplete="current-password" />
                        <x-input-error class="text-xs text-red-600 mt-2" :messages="$errors->get('current_password')" />
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="password" :value="__('New Password')" class="text-lg" />
                        <x-text-input id="password" name="password" type="password" class="block w-full p-4 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500" autocomplete="new-password" />
                        <x-input-error class="text-xs text-red-600 mt-2" :messages="$errors->get('password')" />
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg" />
                        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block w-full p-4 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500" autocomplete="new-password" />
                        <x-input-error class="text-xs text-red-600 mt-2" :messages="$errors->get('password_confirmation')" />
                    </div>

                    <!-- Save Button -->
                    <div class="flex justify-end gap-4 mt-4">
                        <x-primary-button class="px-6 py-3 text-white bg-indigo-600 rounded-md shadow-md hover:bg-indigo-700 focus:outline-none transition-all duration-200">
                            {{ __('Save Changes') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <!-- Delete Account Section -->
            <div class="bg-gradient-to-r from-red-100 via-yellow-100 to-orange-100 p-6 rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300 ease-in-out">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-800">Delete Account</h3>
                    <p class="text-sm text-gray-600">Permanently delete your account and all its data</p>
                </div>

                <p class="text-sm text-gray-700 mt-4">Once you delete your account, all of your data will be permanently erased. Be sure to download any information you want to keep before proceeding.</p>

                <x-danger-button
                    x-data="{}"
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    class="mt-4 w-full py-3 text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none transition-all duration-200"
                >
                    {{ __('Delete Account') }}
                </x-danger-button>

                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-4">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium text-gray-900">Are you sure you want to delete your account?</h2>
                        <p class="text-sm text-gray-600">This action cannot be undone. Please enter your password to confirm the deletion.</p>

                        <div class="space-y-2">
                            <x-input-label for="password" value="Password" class="sr-only" />
                            <x-text-input id="password" name="password" type="password" class="block w-3/4 p-4 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500" placeholder="Enter your password" />
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="text-xs text-red-600 mt-2" />
                        </div>

                        <div class="flex justify-end gap-4">
                            <x-secondary-button x-on:click="$dispatch('close')" class="py-3 px-6 rounded-md text-gray-800 border border-gray-300 focus:outline-none hover:bg-gray-100">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-danger-button class="ml-3 py-3 px-6 rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none transition-all duration-200">
                                {{ __('Delete Account') }}
                            </x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </div>
        </div>
    </div>
</x-app-layout>
