@props(['active'])

@php
$classes = ($active ?? false)
            ? 'sidebar-link-active flex items-center px-3 py-2 text-sm font-medium rounded-md'
            : 'sidebar-link flex items-center px-3 py-2 text-sm font-medium rounded-md transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
