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
    return redirect()->route('book.index');
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(BookController::class)
    ->group(function () {
        Route::get('/book', 'index')->name('book.index');

        Route::get('/book/{id}/page/{page_id?}', 'show')->name('book.show');

        Route::get('/book/create', 'create')->middleware(['auth','can:admin'])->name('book.create');
        Route::post('/book/store', 'store')->middleware(['auth','can:admin'])->name('book.store');
        Route::get('/book/{id}/edit', 'edit')->middleware(['auth','can:admin'])->name('book.edit');
        Route::post('/book/{id}/update', 'update')->middleware(['auth','can:admin'])->name('book.update');       
        Route::delete('/book/{id}/destroy', 'destroy')->middleware(['auth','can:admin'])->name('book.destroy');       
 
        Route::get('/book/{id}/createpage', 'createPage')->middleware(['auth','can:admin'])->name('book.createpage');
        Route::post('/book/{id}/storepage', 'storePage')->middleware(['auth','can:admin'])->name('book.storepage');
        Route::get('/book/editpage/{id}', 'editPage')->middleware(['auth','can:admin'])->name('book.editpage');
        Route::post('/book/updatepage/{page}', 'updatePage')->middleware(['auth','can:admin'])->name('book.updatepage');
        Route::delete('/book/destroypage/{page}', 'destroyPage')->middleware(['auth','can:admin'])->name('book.destroypage');       
 
});

// Route::controller(PageController::class)
//     ->group(function () {
//         Route::get('/page/create',    'create')->middleware(['auth','can:admin'])->name('page.create');
//         Route::post('/page/store',    'store')->middleware(['auth','can:admin'])->name('page.store');
//         Route::get('/page/{id}/edit', 'edit')->middleware(['auth','can:admin'])->name('page.edit');
//         Route::post('/page/{id}',     'update')->middleware(['auth','can:admin'])->name('page.update');       
//         Route::delete('/page/{page}',   'destroy')->middleware(['auth','can:admin'])->name('page.destroy');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
