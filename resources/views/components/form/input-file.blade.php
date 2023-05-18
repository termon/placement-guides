@props(['name',
        'mode' => 'green']
)


@php
$primary   = "text-black     bg-white    file:bg-blue-700   file:text-white    dark:bg-gray-800 dark:text-gray-200";
$secondary = "text-gray-900  bg-white    file:bg-gray-400   file:text-gray-900 dark:bg-gray-800 dark:text-gray-200";
$dark      = "text-white     bg-gray-600 file:bg-gray-900   file:text-white    dark:bg-gray-800 dark:text-gray-200";
$light     = "text-gray-900  bg-white    file:bg-gray-100   file:text-gray-900 dark:bg-gray-600 dark:text-gray-200";
$green     = "text-gray-900  bg-white    file:bg-green-700  file:text-white    dark:bg-gray-800 dark:text-gray-200";
$red       = "text-gray-900  bg-white    file:bg-red-700    file:text-gray-900 dark:bg-gray-800 dark:text-gray-200";
$yellow    = "text-wgray-900 bg-white    file:bg-yellow-400 file:text-gray-900 dark:bg-gray-800 dark:text-gray-200";
$purple    = "text-gray-900  bg-white    file:bg-purple-700 file:text-gray-900 dark:bg-gray-800 dark:text-gray-200";

$classes = 'block w-full text-sm rounded-lg border border-gray-300 cursor-pointer
     focus:outline-none dark:border-gray-600 dark:placeholder-gray-400
     file:mr-2 file:py-2 file:px-3 file:rounded-l-md file:border-0 file:text-sm file:font-semibold
     hover:file:cursor-pointer hover:file:opacity-80';

if ($mode === 'primary')     $classes = $classes . ' ' . $primary;
if ($mode === 'secondary')   $classes = $classes . ' ' . $secondary;
else if ($mode === 'dark')   $classes = $classes . ' ' . $dark;
else if ($mode === 'light')  $classes = $classes . ' ' . $light;
else if ($mode === 'green')  $classes = $classes . ' ' . $green;
else if ($mode === 'red')    $classes = $classes . ' ' . $red;
else if ($mode === 'yellow') $classes = $classes . ' ' . $yellow;
else if ($mode === 'purple') $classes = $classes . ' ' . $purple;
@endphp

<input id={{$name}} name={{$name}} type="file" {{ $attributes->merge(['class' => $classes])}}>
