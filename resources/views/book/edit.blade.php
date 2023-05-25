
<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-bold leading-tight">
           Edit Book
        </h2>
    </x-slot>

        <div class="rounded-xl px-5 py-1 shadow-lg bg-gray-50 mb-4">

            <!-- update classification -->
            <form  method="POST" action={{route("book.update",$book)}}>
                @csrf
                <div class="flex-1">
                    <input type="hidden" name="id" value="{{$book->id}}"></input>
                    <input type="hidden" name="slug" value="{{$book->slug}}"></input>
                
                    <x-form.group label="Title" name="title" class="mb-4 flex-1">
                        <x-form.input name="title" value="{{old('title',$book->title)}}"/>
                    </x-form.group>   
                    
                    <x-form.group label="Description" name="description" class="mb-4 flex-1">
                        <x-form.textarea rows="3" name="description" >
                            {{old('description',$book->description)}}
                        </x-form.textarea>
                    </x-form.group>

                    <div class="my-2">
                    <x-base.button type="submit">Update</x-base.button>
                    <x-base.link href="{{route('book.index')}}">Cancel</x-base.link>
                    </div>
                </div>
            </form>

        </div>


</x-app-layout>
