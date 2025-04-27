@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'mt-3 p-4 rounded-md bg-red-50 border-l-4 border-red-500 shadow-lg transform transition-all duration-300 ease-in-out']) }}>
        <div class="text-sm text-red-600 space-y-2">
            <h3 class="font-semibold text-lg">There were some issues:</h3>
            <ul class="list-disc pl-5">
                @foreach ((array) $messages as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
