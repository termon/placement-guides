<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;

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

Route::get('/', function () {
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
    ->group(function () {
        Route::get('/book', 'index')->name('book.index');
      
        Route::get('/create', 'create')->middleware(['auth','can:admin'])->name('book.create');
        Route::post('/store', 'store')->middleware(['auth','can:admin'])->name('book.store');
        Route::get('/{id}/edit', 'edit')->middleware(['auth','can:admin'])->name('book.edit');
        Route::post('/{id}/update', 'update')->middleware(['auth','can:admin'])->name('book.update');       
        Route::delete('/{id}/destroy', 'destroy')->middleware(['auth','can:admin'])->name('book.destroy');       

        Route::get('/{id}/createpage', 'createPage')->middleware(['auth','can:admin'])->name('book.createpage');
        Route::post('/{id}/storepage', 'storePage')->middleware(['auth','can:admin'])->name('book.storepage');       
        Route::get('/editpage/{id}', 'editPage')->middleware(['auth','can:admin'])->name('book.editpage');
        Route::post('/updatepage/{page}', 'updatePage')->middleware(['auth','can:admin'])->name('book.updatepage');
        Route::delete('/destroypage/{page}', 'destroyPage')->middleware(['auth','can:admin'])->name('book.destroypage');       

        Route::get('/restore', 'restore')->middleware(['auth','can:admin'])->name('book.restore');
        Route::post('/restorepage/{id}', 'restorePage')->middleware(['auth','can:admin'])->name('book.restorepage');
     
        Route::get('{id}/{page_id?}', 'show')->name('book.show');

});
