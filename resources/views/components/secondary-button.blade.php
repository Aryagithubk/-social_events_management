<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-5 py-3 bg-gradient-to-r from-indigo-600 to-indigo-400 text-white font-semibold text-sm rounded-lg shadow-lg transform transition duration-200 hover:scale-105 hover:from-indigo-700 hover:to-indigo-500 focus:outline-none focus:ring-4 focus:ring-indigo-300 focus:ring-opacity-50 disabled:opacity-50 disabled:cursor-not-allowed']) }}>
    {{ $slot }}
</button>
