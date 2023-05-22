

<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl leading-tight">
            Deleted Pages
        </h2>
    </x-slot>


    <div class="p-12">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">Slug</th>
                <th scope="col" class="py-3 px-6">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $p)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                         {{ $p->slug }}
                    </td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">    
                        <form method="POST" action={{route("book.restorepage",['id'=>$p->id])}}>                           
                            @csrf   
                            <input type="hidden" value={{$p->id}}></input>                                                       
                            <x-base.button mode="link" class="text-sm" type="submit" >Restore</x-base.button>
                        </form>          
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</x-app-layout>


