
<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-bold leading-tight">
           Edit Book
        </h2>
    </x-slot>


        <div class="rounded-xl px-5 py-1 shadow-lg bg-gray-50 mb-4">

            <!-- update classification -->
            <form  method="POST" action={{route("books.update",['id'=>$book_id,'slug'=>$slug])}}>
                @csrf
                <div class="flex-1">
                    <input type="hidden" name="book_id" value="{{$book_id}}"></input>
                    <input type="hidden" name="slug" value="{{$slug}}"></input>

                    <x-form.group label="Title" name="title" class="mb-4 flex-1">
                        <x-form.input name="title" value="{{old('title',$title)}}"/>
                    </x-form.group>

                    <x-form.group label="Sequence" name="sequence" class="mb-4 flex-1">
                        <x-form.input name="sequence" value="{{old('sequence',$sequence)}}"/>
                    </x-form.group>

                    <x-form.group label="Markdown" name="markdown" class="mb-4 flex-1">
                        <x-form.textarea rows="35" l name="markdown" >
                            {{old('markdown',$markdown)}}
                        </x-form.textarea>
                    </x-form.group>

                    <div class="my-2">
                    <x-button class="" btype="submit">Update</x-button>
                    <x-link href="{{route('books.show',['id' => $book_id, 'slug' => $slug ])}}">Cancel</x-link>
                    </div>
                </div>
            </form>

        </div>


</x-app-layout>
