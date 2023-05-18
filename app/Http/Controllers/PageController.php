<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new page for specified book resource.
     */
    public function create($id)
    { 
        $book = Book::findOrFail($id);
        $page = new Page;
        $page->book_id = $id;
        return view('page.create', ['page' => $page]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {        
        $book_id = $page->book_id;
        $page->delete();
        return redirect()->route('book.show',['id'=>$book_id])->with('info', 'Page Deleted Successfully');
 
    }
}
