<?php
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BookController::class,'index'])->name('books.index');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/{book}', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('{book}/delte', [BookController::class, 'destroy'])->name('books.destroy');
