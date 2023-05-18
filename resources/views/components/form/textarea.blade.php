@props([
    'name',
])

<textarea id={{$name}} name={{$name}} {{ $attributes->merge(['class' =>'block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'])}}>
{{ $slot }}
</textarea>
