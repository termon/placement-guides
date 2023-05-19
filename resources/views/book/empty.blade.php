

<x-app-layout>
<x-slot name="header">
        <div class="flex space-x-2 justify-between">
            <div class="flex gap-2 items-center">
                <x-svg.engineer class="text-black dark:text-white dark:bg-gray-900" width="60" />
                <h1 class="text-slate-900 font-bold ml-4 text-2xl md:text-3xl lg:text-4xl dark:text-white dark:bg-gray-900">
                    {{$book->title}}
                </h1>
            </div>  
            @can('admin')
                <a href="{{route('book.createpage', $book->slug)}}" class="flex content-center">     
                    <x-svg.plus class="text-green-900"/>        
                    <span class="font-bold">Add Page</span>
                </a> 
            @endcan
        </div>
    </x-slot>



    <!-- page content -->
    <article class="mt-2 mx-auto prose dark:prose-invert dark:bg-gray-900 dark:prose-h2:text-blue-200 dark:prose-h3:text-slate-400 prose-h2:text-blue-900">           
        <div class="text-lg"> No pages available</div>
    </article>        
        
</x-app-layout>


