@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-2 bg-white rounded-md shadow-xl'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
@endphp

<div class="relative" x-data="{ open: false }">
    <div @click="open = !open" class="cursor-pointer">
        {{ $trigger }}
    </div>

    <div 
        x-show="open" 
        @click.away="open = false"
        class="absolute z-50 mt-2 {{ $width }} {{ $alignmentClasses }} transition-transform transform"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        style="display: none;">
        
        <div class="rounded-lg shadow-xl ring-1 ring-black ring-opacity-5 {{ $contentClasses }} bg-gray-50">
            <div class="p-3">
                {{ $content }}
            </div>
        </div>
    </div>
</div>
