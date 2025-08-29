@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-3 py-2 pl-8 text-sm font-medium text-indigo-600 bg-indigo-50 border-r-2 border-indigo-600 rounded-md'
            : 'flex items-center px-3 py-2 pl-8 text-sm font-medium text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-md transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
