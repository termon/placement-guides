@props(['thead', 'tbody'])

{{-- <div class="overflow-x-auto relative">
    <div class="overflow-x-scroll"> --}}
    <table {{$attributes->merge(['class' => 'table-auto w-full border-spacing-0 text-sm text-left text-gray-500 dark:text-gray-400'])}}>
        <thead class="text-xs text-gray-900 font-bold uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            {{ $thead }}
        </thead>
        <tbody>
            {{ $tbody }}
        </tbody>
    </table>
{{-- </div> --}}
