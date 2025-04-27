<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-xl font-medium text-sm text-white uppercase tracking-wide transition-all ease-in-out duration-300 transform hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 focus:outline-none focus:ring-offset-2 active:bg-indigo-800 hover:scale-105 active:scale-95']) }}>
    {{ $slot }}
</button>
