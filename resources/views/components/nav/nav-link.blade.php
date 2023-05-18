@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-gray-100 dark:border-white    text-md font-bold     leading-5 text-gray-200 dark:text-white    focus:outline-none focus:border-gray-200 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-md font-semibold leading-5 text-gray-300 dark:text-gray-400 hover:text-gray-200 hover:border-gray-200 focus:outline-none focus:text-gray-700 focus:border-gray-200 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
