@props(['active' => false, 'label'])

@php
$classes = ($active ?? false)
            ? 'sidebar-link-active flex items-center justify-between w-full px-3 py-2 text-sm font-medium rounded-md'
            : 'sidebar-link flex items-center justify-between w-full px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out';
@endphp

<button {{ $attributes->merge(['class' => $classes, 'type' => 'button']) }}>
    <div class="flex items-center">
        {{ $slot }}
        <span>{{ $label }}</span>
    </div>
    <svg class="h-4 w-4 transition-transform duration-200" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
    </svg>
</button>
