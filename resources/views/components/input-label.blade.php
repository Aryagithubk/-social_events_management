@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-gray-700 transition duration-200 transform hover:scale-105 hover:text-indigo-600']) }}>
    <span class="inline-block bg-gray-100 px-2 py-1 rounded-md shadow-sm animate-fade-in">
        {{ $value ?? $slot }}
    </span>
</label>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(-5px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>