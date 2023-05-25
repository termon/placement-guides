<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PreviewController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return redirect()->route('book.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(BookController::class)
    ->prefix('book') 
    ->middleware(['auth', 'verified'])   
    ->group(function () {
        Route::get('/', 'index')->name('book.index');
      
        Route::get('/create', 'create')->name('book.create');
        Route::post('/store', 'store')->name('book.store');
        Route::post('/{book}/clone', 'clone')->name('book.clone');    

        Route::get('/{book}/edit', 'edit')->name('book.edit');
        Route::post('/{book}/update', 'update')->name('book.update');       

        Route::get('/restorable', 'restorable')->name('book.restorable');
        
        Route::delete('/{book}/delete', 'delete')->name('book.delete');                     
        Route::post('/{book}/restore', 'restore')->name('book.restore')->withTrashed();
        Route::post('/{book}/destroy', 'destroy')->name('book.destroy')->withTrashed();              

        Route::get('/{book}/createpage', 'createPage')->name('book.createpage');
        Route::post('/{book}/storepage', 'storePage')->name('book.storepage');       
           
        Route::get('/{page}/editpage', 'editPage')->name('book.editpage');
        Route::post('/{page}/updatepage', 'updatePage')->name('book.updatepage');
        
        Route::delete('/{page}/deletepage', 'deletePage')->name('book.deletepage');
        Route::post('/{page}/restorepage', 'restorePage')->name('book.restorepage')->withTrashed();
        Route::post('/{page}/destroypage', 'destroyPage')->name('book.destroypage')->withTrashed();              

        Route::get('/{book}', 'show')->name('book.show');
        Route::get('/{book}/page/{page}', 'showPage')->name('book.showpage')->scopeBindings();
        //Route::get('/{book}/{page?}', 'show')->name('book.show')->scopeBindings();

});

Route::controller(PreviewController::class)->group(function () {
    Route::get('/', [PreviewController::class, 'index'])->name('preview.index');
    Route::get('/{book:slug}', [PreviewController::class, 'show'])->name('preview.show');
    Route::get('/{book:slug}/page/{page:slug}', [PreviewController::class, 'showPage'])->scopeBindings()->name('preview.showpage');
});