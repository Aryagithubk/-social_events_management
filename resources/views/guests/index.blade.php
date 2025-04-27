<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-3xl text-gray-900 leading-tight animate__animated animate__fadeIn">
                {{ __('Guests') }}
            </h2>
            <a href="{{ route('guests.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transform transition-all hover:scale-105">
                Add Guest
            </a>
        </div>
    </x-slot>

    <div class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-8">
                <div class="text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100 text-gray-600">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-medium tracking-wider">Name</th>
                                    <th class="px-6 py-4 text-left text-sm font-medium tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left text-sm font-medium tracking-wider">Phone</th>
                                    <th class="px-6 py-4 text-left text-sm font-medium tracking-wider">Events Attending</th>
                                    <th class="px-6 py-4 text-left text-sm font-medium tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($guests as $guest)
                                    <tr class="transition duration-300 hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $guest->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $guest->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $guest->phone ?? 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $guest->events->where('pivot.status', 'accepted')->count() }} events
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('guests.show', $guest) }}" class="text-blue-600 hover:text-blue-800 transition-all">View</a>
                                            <a href="{{ route('guests.edit', $guest) }}" class="ml-4 text-yellow-600 hover:text-yellow-800 transition-all">Edit</a>
                                            <form action="{{ route('guests.destroy', $guest) }}" method="POST" class="inline ml-4">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 transition-all" onclick="return confirm('Are you sure you want to delete this guest?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $guests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
