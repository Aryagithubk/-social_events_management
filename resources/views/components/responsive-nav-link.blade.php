@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-4 pr-6 py-3 text-left text-lg font-medium text-indigo-700 bg-indigo-100 border-l-4 border-indigo-500 transition-all duration-200 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 hover:bg-indigo-200'
            : 'block w-full pl-4 pr-6 py-3 text-left text-lg font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition-all duration-200 ease-in-out transform hover:scale-105';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
