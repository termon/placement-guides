<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Book;
use App\Models\Page;
use App\Exceptions\Handler;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Book::class);

        // display books owned by authenticated author OR all if administrator
        //$books = Book::authored()->get();
        $books = Book::all();
        return view('book.index',['books' => $books]);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id - book id or slug
     * @param  integer  $page_id - page id or slug 
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $this->authorize('view', $book);

        if($book == null) 
        {
            return redirect()->route('book.index')->with('info', "Book does not exist.");     
        }

        // try to load first page
        $page = $book->pages?->first();    
             
        // render page markdown or empty placeholer if page not available
        if ($page)
        {
            $content = Str::of($page->markdown)->markdown();
            return view('book.show',['book' => $book, 'page' => $page, 'content' => $content]);
        } else {
            return view('book.empty',['book' => $book]);
        }
       
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $book = new Book;
        $book->user_id = $request->user()->id;
        return view('book.create', ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        $this->authorize('create', Book::class);

        $validated = $request->validate([                                   
            'title' => ['required','unique:books,title'],
            'description' => ['required','max:500'],
            'user_id' => ['required']
        ]);
        Book::create($validated);    
        return redirect()->route('book.index')
                         ->with('info', 'Book Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $this->authorize('update', $book);

        if ($book == null) {
            return redirect()->route('book.index')
                         ->with('info', 'Book Could not be found');
        }

        return view('book.edit', ['book'=>$book]);        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book);

        $id = $request['id'];
        $validated = $request->validate([ 
            'id' => 'required',                                  
            'title' => ['required', Rule::unique('books')->ignore($id)],
            'description' => ['required','max:500'],
        ]);
        $updatedbook = Book::findOrFail($id);

        $updatedbook->title = $validated['title'];    
        $updatedbook->description = $validated['description'];              
        $updatedbook->save();
       
        return redirect()->route('book.index')
                         ->with('info', 'Book Updated Successfully');
    }

    /**
     * Clone the specified resource in storage.
     */
    public function clone(Request $request, Book $book)
    {
        $this->authorize('create', $book);
       
        $cloned = $book->cloneForUser($request->user());
       
        if ($cloned != null) {
            return redirect()->route('book.index')->with('info', 'Book Cloned Successfully');
        } else {
            return redirect()->route('book.index')->with('info', 'Book Could not be Cloned');
        }
    }

    /**
     * Show Restorable Books and Pages from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function restorable()
    {
        $books = Book::with('pages')->onlyTrashed()->get();
        $pages = Page::with('book')->onlyTrashed()->get();
        
        return view('book.restore',['books' => $books, 'pages' =>$pages]);
    }

    /**
     * Soft Delete book from storage.
     *
     * @param  \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function delete(Book $book)
    {
        $this->authorize('delete', $book);
   
        $book->delete();
    
        return redirect()->route('book.index')
                         ->with('info', 'Book Deleted Successfully');

    }

    /**
     * Permanently Delete specified resource from storage.
     *
     * @param  \App\Models\Book  $handbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->authorize('forceDelete', $book);
       
        $book->forceDelete($book);
        return redirect()->route('book.restorable')
                         ->with('info', 'Book Destroyed Successfully');
    }


    /**
     * Restore soft deleted book from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function restore(Book $book)
    {
        $this->authorize('restore',$book);
        $book->restore();
    
        return redirect()->route('book.restorable')
                         ->with('info', 'Book Restored Successfully');

    }


    // ============================== PAGES ====================================
   
     /**
     * Show specified page in a book
     *
     * @param Book $book
     * @param Page $page
     * @return \Illuminate\Http\Response
     */
    public function showPage(Book $book, Page $page)
    {
        $this->authorize('view', $book);

        if($book == null) 
        {
            return redirect()->route('book.index')->with('info', "Book does not exist.");     
        }

        if (!$page) 
        {            
            // try to load first page
            $page = $book->pages?->first();    
        }
       
        // render page markdown or empty placeholer if page not available
        if ($page)
        {
            $content = Str::of($page->markdown)->markdown();
            return view('book.show',['book' => $book, 'page' => $page, 'content' => $content]);
        } else {
            return view('book.empty',['book' => $book]);
        }
       
    }

    /**
     * Show the form for creating a new page in specified book resource.
     *
     * @param integer  $id
     * @return \Illuminate\Http\Response
     */
    public function createPage(Book $book)
    {        
        $this->authorize('update', $book);

        if ($book == null) {
            return redirect()->route('book.index')
                         ->with('info', 'Book Could not be found');
        }
        $page = new Page;
        $page->book_id = $book->id;
        return view('book.page.create', ['page' => $page]);
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePage(Request $request)
    {        
        $this->authorize('create', Book::class);

        $validated = $request->validate([            
            'book_id' => 'exists:books,id',
            'title' => ['required', Rule::unique('pages')->where(fn ($query) => $query->where('book_id', $request['book_id']))],
            'markdown' => 'required',
            //'slug' => ['required','unique:pages,slug'],
            'sequence' => 'required|integer'        
        ]);      
        $page = Page::create($validated);
        
        return redirect()->route('book.show',['book' => $page->book->id, 'page'=>$page->id])
                         ->with('info', 'Page Added Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function editPage(Page $page)
    {       
        $this->authorize('update', $page->book);

        return view('book.page.edit',['page' => $page]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function updatePage(Request $request, Page $page)
    {
        $this->authorize('update', $page?->book);

        $validated = $request->validate([
            'book_id' => 'exists:books,id',
            'title' => 'required',
            'markdown' => 'required',
            'slug' => 'required',
            'sequence' => 'required|integer'
        ]);
        $page = Page::where('book_id','=',$request->input('book_id'))
                         ->where('slug', '=', $request->input('slug'))
                         ->firstOrFail();

        $page->title = $validated['title'];
        $page->markdown = $validated['markdown'];
        $page->sequence = $validated['sequence'];
        $page->save();

        return redirect()->route('book.showpage',['book' => $page->book->id, 'page'=>$page->id]);
    }

    /**
     * Remove the specified page resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function deletePage(Page $page)
    {
        $this->authorize('delete', $page->book);

        $book_id = $page->book_id;      

        $page->delete();
        return redirect()->route('book.show',['book'=>$book_id])->with('info', 'Page Deleted Successfully');

    }

    /**
     * Restore soft deleted page from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function restorePage(Page $page)
    {
        $this->authorize('restore',$page->book);
        $page->restore();
    
        return redirect()->route('book.restorable')
                         ->with('info', 'Page Restored Successfully');

    }

    /**
     * Permanently delete soft deleted page from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroyage(Page $page)
    {
        $this->authorize('forceDelete');
   
        $page->forceDelete();
    
        return redirect()->route('book.restorable')
                         ->with('info', 'Page Deleted Permanently');

    }

}
