

<x-app-layout>
    <x-slot name="header">
        <div class="flex space-x-2 items-end">
            <x-svg.engineer class="text-black dark:text-white dark:bg-gray-900" width="60" />
            <h1 class="text-slate-900 font-bold ml-4 text-2xl md:text-3xl lg:text-4xl dark:text-white dark:bg-gray-900">
                {{$book->title}}
            </h1>
        </div>
    </x-slot>


    <div class="flex flex-col lg:flex-row gap-2 min-h-screen text-gray-800 dark:text-gray-100 dark:bg-gray-900">
        <!-- left book contents side panel -->
        <aside class="rounded overflow-y-auto px-3  dark:bg-gray-900 dark:text-gray-100">
                <span class="text-blue-900 dark:text-blue-200 font-bold text-lg">Contents</span>
                <ul class="mt-2 space-y-2">
                    @foreach($book->pages as $p)
                        <li class="px-1 py-1 hover:bg-gray-200 dark:hover:bg-gray-800 rounded flex space-x-1">
                            <x-svg.book-icons icon="{{$p->slug}}"  />
                            <a href="{{route('books.show',['id' => $p->book_id, 'slug' => $p->slug])}}" class="font-semibold" >
                                {{-- <span>{{$p->sequence}}.</span>  --}}
                                <span>{{$p->title}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
        </aside>

        <!-- page content -->
        <article class="mt-2 mx-auto prose dark:prose-invert dark:bg-gray-900 dark:prose-h2:text-blue-200 dark:prose-h3:text-slate-400 prose-h2:text-blue-900">
            <h1 class="text-blue-900 dark:text-white">
                {{$page->title}}
                @can('admin')
                <a href="{{route('books.edit',['id'=>$page->book_id, 'slug'=>$page->slug])}}" class="text-xs">Edit</a>
                @endcan
            </h1>
            {!! $content !!}
        </article>

        <!-- right sidebar -->
        <aside class="w-64 hidden lg:block overflow-y-auto py-4 px-3 dark:bg-gray-900 rounded" aria-label="RightSidebar">
            <span class="text-md text-blue-900 dark:text-blue-200 font-bold">Quick Links</span>
            <ul id="links" class="px-3" x-data="{ headers: [] }" x-init="headers = document.querySelectorAll('h2, h3, h4, h5, h6'); headers.forEach((el,index) => el.id = slugify(el.innerText));">
                <template x-for="h in headers">
                    <li :class="'ml-' + indent(h.tagName) + ' py-1 rounded hover:bg-gray-200 dark:text-slate-100 dark:hover:bg-gray-800 ' + sideBarHeadingCss(h.tagName)">
                        <a :href="'#' + h.id" x-text="h.innerHTML"></a>
                    </li>
                </template>
            </ul>
        </aside>
    </div>

    <script>
        const sideBarHeadingCss = (tagName) =>  (tagName=='H2' ? 'font-bold' : '')

        const indent  = (h) => {
            let space = 1
            if (h == "H2") space = 0
            if (h == "H3") space = 2
            if (h == "H4") space = 4
            if (h == "H5") space = 6
            return space
        }

        const slugify = str => str.toLowerCase().trim()
                                  .replace(/[^\w\s-]/g, '')
                                  .replace(/[\s_-]+/g, '-')
                                  .replace(/^-+|-+$/g, '')
    </script>

</x-app-layout>


