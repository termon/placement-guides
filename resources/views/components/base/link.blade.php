@props(['mode' => 'link'])
@php
$primary   = "text-white    bg-blue-700   font-medium rounded-lg text-sm px-5 py-2.5 hover:font-bold hover:bg-blue-800                focus:outline-none focus:ring-2 focus:ring-blue-300   dark:text-white    dark:bg-blue-600    dark:hover:bg-blue-700   dark:focus:ring-blue-800";
$secondary = "text-gray-900 bg-gray-400   font-medium rounded-lg text-sm px-5 py-2.5 hover:font-bold hover:bg-gray-500                focus:outline-none focus:ring-2 focus:ring-gray-300   dark:text-white    dark:bg-gray-600    dark:hover:bg-gray-700   dark:focus:ring-gray-700";
$dark      = "text-white    bg-gray-800   font-medium rounded-lg text-sm px-5 py-2.5 hover:font-bold hover:bg-gray-900                focus:outline-none focus:ring-2 focus:ring-gray-300   dark:text-white    dark:bg-gray-800    dark:hover:bg-gray-700   dark:focus:ring-gray-700";
$green     = "text-white    bg-green-700  font-medium rounded-lg text-sm px-5 py-2.5 hover:font-bold hover:bg-green-800               focus:outline-none focus:ring-2 focus:ring-green-300  dark:text-white    dark:bg-green-600   dark:hover:bg-green-700  dark:focus:ring-green-800";
$red       = "text-white    bg-red-700    font-medium rounded-lg text-sm px-5 py-2.5 hover:font-bold hover:bg-red-800                 focus:outline-none focus:ring-2 focus:ring-red-300    dark:text-white    dark:bg-red-600     dark:hover:bg-red-700    dark:focus:ring-red-900";
$yellow    = "text-white    bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2.5 hover:font-bold hover:bg-yellow-500              focus:outline-none focus:ring-2 focus:ring-yellow-300 dark:text-white    dark:bg-yellow-600  dark:hover:bg-yellow-700 dark:focus:ring-yellow-900";
$purple    = "text-white    bg-purple-700 font-medium rounded-lg text-sm px-5 py-2.5 hover:font-bold hover:bg-purple-800              focus:outline-none focus:ring-2 focus:ring-purple-300 dark:text-white    dark:bg-purple-600  dark:hover:bg-purple-700 dark:focus:ring-purple-900";
$light     = "text-gray-900 bg-gray-200   font-medium rounded-lg text-sm px-5 py-2.5 hover:font-bold hover:bg-gray-100                focus:outline-none focus:ring-2 focus:ring-gray-300   dark:text-gray-900 dark:bg-gray-300    dark:hover:bg-gray-400   dark:focus:ring-gray-700  dark:border-gray-700";
$link      = "text-gray-900               font-medium rounded-lg text-sm px-5 py-2.5 hover:font-bold hover:text-black hover:underline focus:outline-none focus:ring-2 focus:ring-gray-300   dark:text-white";
$none      = "text-gray-900               font-medium            text-sm             hover:font-bold hover:text-black hover:underline focus:outline-none                                    dark:text-white";

$classes = 'no-underline hover:underline inline-flex whitespace-nowrap cursor-pointer items-center disabled:opacity-25 transition ease-in-out duration-150';
if ($mode === 'primary')        $classes = $classes . ' ' . $primary;
else if ($mode === 'secondary') $classes = $classes . ' ' . $secondary;
else if ($mode === 'dark')      $classes = $classes . ' ' . $dark;
else if ($mode === 'light')     $classes = $classes . ' ' . $light;
else if ($mode === 'green')     $classes = $classes . ' ' . $green;
else if ($mode === 'red')       $classes = $classes . ' ' . $red;
else if ($mode === 'yellow')    $classes = $classes . ' ' . $yellow;
else if ($mode === 'purple')    $classes = $classes . ' ' . $purple;
else if ($mode === 'link')      $classes = $classes . ' ' . $link;
else $classes =  $classes . ' ' . $none;
@endphp

<a {{ $attributes->merge(['class' => $classes ]) }}>
    {{ $slot }}
</a>

