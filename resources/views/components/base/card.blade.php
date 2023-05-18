<!-- class="justify-center items-center" -->
<div {{ $attributes->merge(['class' => 'flex flex-col'])}}>

    <div class="w-full px-6 py-4 shadow-md overflow-hidden sm:rounded-lg border bg-gray-50 border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        @if (isset($title))
        <div class="flex justify-between items-start py-4 mb-5 text-2xl font-bold rounded-t border-b border-gray-800 dark:border-gray-600">

            {{ $title }}

        </div>
       @endif

        {{ $slot }}
    </div>
</div>


{{-- <div {{ $attributes->merge(['class' => 'p-4 sm:p-6 md:p-8 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700'])}}>
    {{$slot}}
</div> --}}
