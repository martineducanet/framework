<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index']);
Route::post('/store', [BookController::class, 'store'])->name('books.store');
Route::delete('/delete/{book}', [BookController::class, 'destroy'])->name('books.delete');