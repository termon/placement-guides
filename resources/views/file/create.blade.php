
<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-bold leading-tight">
           Upload File
        </h2>
    </x-slot>

    <div class="rounded-xl px-5 py-1 shadow-lg bg-gray-50 mb-4">

        <form  method="POST" action={{route("file.store")}} enctype="multipart/form-data">
            @csrf
            <div class="flex-1">               
      
                <x-form.group label="Name" name="name" class="mb-4 flex-1">
                    <x-form.input name="name" class="" />
                </x-form.group>

                <x-form.group label="File" name="file" class="mb-4 flex-1">
                    <x-form.input-file name="file" class="" />
                </x-form.group>
               
                <div class="my-2">
                <x-base.button type="submit">Upload</x-button>
                <x-base.link href="{{route('file.index')}}">Cancel</x-link>
                </div>
            </div>
        </form>

    </div>

</x-app-layout>
