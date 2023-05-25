

<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl leading-tight">
            Restorable Books and Pages
        </h2>
    </x-slot>

    <div class="py-3">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">#</th>
                <th scope="col" class="py-3 px-6">Title</th>
                <th scope="col" class="py-3 px-6">Actions</th>
            </tr>
            </thead>
            <tbody>

            @foreach($books as $b)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span>Book</span> {{ $b->id }}
                    </td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                         {{ $b->title }}
                    </td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-1">  
                        @can('restore',$b) 
                        <form method="POST" action={{route("book.restore",['book' =>$b->id])}}>                      
                            @csrf                              
                            <x-base.button mode="none" type="submit">
                                <x-svg.eye />   
                            </x-base.button>
                        </form> 
                        @endcan
                        @can('forceDelete',$b)  
                        <form method="POST" action={{route("book.destroy",['book' =>$b->id])}}>                      
                            @csrf   
                            <x-base.button mode="none" type="submit">
                                <x-svg.trash />   
                            </x-base.button>
                        </form> 
                        @endcan         
                    </td>
                </tr>
            @endforeach
        
    
            <tr class="bg-gray-700 border-b dark:bg-gray-800 dark:border-gray-700">
                <td colspan="3"></td>
            </tr>
   
            @foreach($pages as $p)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span>Page</span>  {{ $p->id }}
                    </td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                         {{ $p->title }}
                    </td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white flex gap-1">  
                        @can('restore',$p->book) 
                        <form method="POST" action={{route("book.restorepage",['page' =>$p->id])}}>                      
                            @csrf                              
                            <x-base.button mode="none" type="submit">
                                <x-svg.eye />   
                            </x-base.button>
                        </form> 
                        @endcan
                        @can('forceDelete',$p->book)  
                        <form method="POST" action={{route("book.deletepage",['page' =>$p->id])}}>                      
                            @csrf   
                            <x-base.button mode="none" type="submit">
                                <x-svg.trash />   
                            </x-base.button>
                        </form> 
                        @endcan         
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>


