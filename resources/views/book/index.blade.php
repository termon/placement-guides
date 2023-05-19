

<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl leading-tight">
            Handbook
        </h2>
    </x-slot>


    <div class="p-12">
        @auth
        <a href="{{route('book.create')}}" class="flex gap-2 mb-3">
            <x-svg.plus class="text-blue-500" />Create 
        </a> 
        @endauth
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">Title</th>
                <th scope="col" class="py-3 px-6">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $b)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                         {{ $b->title }}
                    </td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex gap-1">
                            <a href="{{route('book.show', $b->slug)}}">
                                <x-svg.list />
                            </a>
                            @auth
                                <a href="{{route('book.edit', $b->slug)}}">
                                    <x-svg.edit />                 
                                </a>
                            @endauth
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</x-app-layout>


