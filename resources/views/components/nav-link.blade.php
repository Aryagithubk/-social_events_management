@props(['active'])

@php
    $classes = ($active ?? false)
        ? 'inline-flex items-center px-4 py-2 border-b-4 border-white text-sm font-medium leading-5 text-white focus:outline-none transition-all duration-300 ease-in-out'
        : 'inline-flex items-center px-4 py-2 border-b-4 border-transparent text-sm font-medium leading-5 text-white focus:outline-none transition-all duration-300 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="transition-colors duration-300 ease-in-out">
        {{ $slot }}
    </span>
</a>