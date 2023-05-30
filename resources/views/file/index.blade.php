

<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl leading-tight">
           File Gallery
        </h2>
    </x-slot>


    <div class="p-12">
       
        <a href="{{route('file.create')}}" class="flex gap-2 mb-3">
            <x-svg.plus class="text-blue-500" />Upload 
        </a> 
      
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">Url</th>
                <th scope="col" class="py-3 px-6">Preview</th>
                <th scope="col" class="py-3 px-6">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($files as $file)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{ Storage::url($file) }}
                    </td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       <img src={{Storage::url($file)}} class="w-64"/>
                    </td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      
                       <form method="POST" action={{route("file.destroy")}}>
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="file" value={{$file}}></input>
                            <x-base.button mode="none" type="submit">
                                <x-svg.trash />    
                            </x-button>                               
                            </div>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

</x-app-layout>


