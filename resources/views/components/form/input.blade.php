@props([
    'type' => 'text',
    'name'
])
<input  id={{$name}} name={{$name}} type={{$type}}  {{$attributes->merge(['class'=>"form-input w-full  border border-gray-300 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"])}}>



