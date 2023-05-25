// Book.php model 

// use Page book relationship onDelete('cascade') instead   
public static function boot()
{
    parent::boot();
    self::deleting(function($model) { 
        error_log('deleting book pages: ' . $model->title);
        $model->pages()->each(function($page) {
            $page->delete();
        });
    });
}


// BookController.php

public function show1(Request $request, $id, $page_id=null)
{
    $book = Book::with('pages')->where('id',$id)
                                ->first();
    if($book == null) 
    {
        return redirect()->route('book.index')->with('info', "Book does not exist.");     
    }

    $this->authorize('view', $book);

    if ($page_id) 
    {
        // try to locate specified page in book
        $page = $book->pages
                        ->where('id',$page_id)
                        ->first();
    } else {
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

public function showOrig(Request $request, $id, $page_id=null)
{
    $book = Book::with('pages')->where('slug',$id)
                                ->first();
    if($book == null) 
    {
        return redirect()->route('book.index')->with('info', "Book does not exist.");     
    }

    $this->authorize('view', $book);

    if ($page_id) 
    {
        // try to locate specified page in book
        $page = $book->pages
                        ->where('slug',$page_id)
                        ->first();
    } else {
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
