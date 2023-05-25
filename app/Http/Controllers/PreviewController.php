<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Page;
use App\Exceptions\Handler;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class PreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('preview.index',['books' => $books]);
    }

    public function show(Book $book)
    {
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
            return view('preview.show',['book' => $book, 'page' => $page, 'content' => $content]);
        } else {
            return view('book.empty',['book' => $book]);
        }
       
    }

    public function showPage(Book $book, Page $page)
    {       
        if ($book == null) 
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
            return view('preview.show',['book' => $book, 'page' => $page, 'content' => $content]);
        } else {
            return view('book.empty',['book' => $book]);
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function showOrig(Request $request, $id, $page_id=null)
    {
        $book = null;
        $page = null;

        $book = Book::with('pages')->where('id','=',$id)->orWhere('slug','=',$id)->first();
        
        if($book == null ) {
            return redirect()->route('book.index')->with('info', "Book does not exist.");     
        }

        if ($page_id) {
            // try to locate specified page
            $page = $book->pages
                         ->where('slug','=',$page_id)
                         ->first();
        } else {
            // try to load first pagea
            $page = $book->pages?->first();    
        }
       
         
        // render page markdown or empty placeholer if page not available
        if ($page) {
            $content = Str::of($page->markdown)->markdown();
            return view('book.show',['book' => $book, 'page' => $page, 'content' => $content]);
        } else {
            return view('book.empty',['book' => $book]);
        }
       
    }

}
