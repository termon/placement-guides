
<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-bold leading-tight">
           Edit Page
        </h2>
    </x-slot>


        <div class="rounded-xl px-5 py-1 shadow-lg bg-gray-50 mb-4">

            <!-- update classification -->
            <form  method="POST" action={{route("book.updatepage",['page'=>$page])}}>
                @csrf
                <div class="flex-1">
                    <input type="hidden" name="id" value="{{$page->id}}"></input>   
                    <input type="hidden" name="book_id" value="{{$page->book_id}}"></input>           
                    <input type="hidden" name="slug" value="{{$page->slug}}"></input>

                    <x-form.group label="Title" name="title" class="mb-4 flex-1">
                        <x-form.input name="title" value="{{old('title',$page->title)}}"/>
                    </x-form.group>

                    <x-form.group label="Sequence" name="sequence" class="mb-4 flex-1">
                        <x-form.input name="sequence" value="{{old('sequence',$page->sequence)}}"/>
                    </x-form.group>

                    <x-form.group label="Markdown" name="markdown" class="mb-4 flex-1">
                        <x-form.textarea rows="35" l name="markdown" >
                            {{old('markdown',$page->markdown)}}
                        </x-form.textarea>
                    </x-form.group>

                    <div class="my-2">
                    <x-base.button class="" btype="submit">Update</x-button>
                    <x-base.link href="{{route('book.show',['id' => $page->book_id, 'page_id'=>$page->id])}}">Cancel</x-link>
                    </div>
                </div>
            </form>

        </div>


</x-app-layout>
