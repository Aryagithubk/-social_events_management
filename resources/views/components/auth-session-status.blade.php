@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-sm font-semibold text-white bg-green-500 px-4 py-3 rounded-lg shadow-md animate-fade-in-scale']) }}>
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5 text-white animate-pulse" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m0 0a9 9 0 11-6.32-3.16" />
            </svg>
            <span>{{ $status }}</span>
        </div>
    </div>
@endif

<style>
    @keyframes fade-in-scale {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fade-in-scale {
        animation: fade-in-scale 0.4s ease-out;
    }
</style>