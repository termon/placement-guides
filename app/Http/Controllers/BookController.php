<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Page;
use App\Exceptions\Handler;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('book.index',['books' => $books]);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $page_id=null)
    {
        $book = Book::with('pages')->findOrFail($id);
        $pages = $book->pages;
        $page = $pages->first();

        $page = $page_id ? $pages->where('id','=',$page_id)->first() : $pages->first();
        if ($page) {
            $content = Str::of($page->markdown)->markdown();
            return view('book.show',['book' => $book, 'page' => $page, 'content' => $content]);
        }
        return redirect()->route('book.index')->with('info', "Book has no pages.");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create', ['book' => new Book]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([                       
            'title' => 'required',
            'slug' => ['required','unique:books,slug'],
        ]);

        Book::create($validated);
        return redirect()->route('book.index')
                         ->with('info', 'Book Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $handbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        Book::delete($book);
        return redirect()->route('book.index',[])
                         ->with('info', 'Book Deleted Successfully');
    }


    // ============================ Pages =====================================
   
    /**
     * Show the form for creating a new page in specified book resource.
     *
     * @param integer  $id
     * @return \Illuminate\Http\Response
     */
    public function createPage($id)
    { 
        $book = Book::findOrFail($id);
        $page = new Page;
        $page->book_id = $id;
        return view('page.create', ['page' => $page]);
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePage(Request $request)
    {
        $validated = $request->validate([            
            'book_id' => 'exists:books,id',
            'title' => 'required',
            'markdown' => 'required',
            'slug' => ['required','unique:pages,slug'],
            'sequence' => 'required|integer'        
        ]);
        
        $page = Page::create($validated);
        
        return redirect()->route('book.show',['id' => $page->book_id, 'page_id'=>$page->id])
                         ->with('info', 'Page Added Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function editPage($id)
    {
        $page = Page::where('id', '=', $id)->firstOrFail();
        return view('page.edit',['page' => $page]);
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
        return redirect()->route('book.show',['id' => $validated['book_id'], 'page_id'=>$page->id]);
    }

    /**
     * Remove the specified page resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroyPage(Page $page)
    {
        $book_id = $page->book_id;
        $page->delete();
        return redirect()->route('book.show',['id'=>$book_id])->with('info', 'Page Deleted Successfully');

    }

}
