

<x-preview-layout>

    <x-slot name="header">
        <h2 class="text-xl leading-tight">
           Handbooks
        </h2>
    </x-slot>


    <div class="p-12">       
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">Title</th>
                <th scope="col" class="py-3 px-6">View</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $b)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                         <div class="font-semibold text-lg">{{ $b->title }}</div>
                         <div class="font-small text-gray-600 whitespace-normal">{{ $b->description }}</div>
                    </td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="flex gap-1">
                            <a href="{{route('preview.show', $b->slug)}}">
                                <x-svg.list />
                            </a>                           
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table> 


        <!-- <div class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
            @foreach($books as $b)
                <div class="flex flex-row gap-3 pb-6 align-items-center">
                    <div>
                        <span class="mb-1 font-semibold text-gray-900 md:text-lg dark:text-gray-400">{{$b->title}}</span>
                        <span class="text-md text-blue-700 ">{{$b->slug}}</span>
                    <div>
                    <a href="{{route('preview.show', $b->slug)}}"> <x-svg.list /> </a>  
                </div>     
            @endforeach
        </div> -->

    </div>

</x-preview-layout>


