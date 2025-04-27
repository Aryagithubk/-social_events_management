<a 
    {{ $attributes->merge([
        'class' => 'block w-full px-6 py-3 text-lg text-gray-800 hover:text-white hover:bg-gradient-to-r hover:from-indigo-500 hover:to-purple-600 rounded-lg shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50'
    ]) }}
>
    {{ $slot }}
</a>
