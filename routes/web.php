<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

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

// Books index
Route::get('/', [BooksController::class, 'index'])->name('books.index');

// Books create
Route::get('/create', [BooksController::class, 'create'])->name('books.create.index');
Route::post('/store', [BooksController::class, 'store'])->name('books.create.store');

// Books edit
Route::get('/edit/{id}', [BooksController::class, 'edit'])->name('books.edit.index');
Route::put('/update/{id}', [BooksController::class, 'update'])->name('books.edit.update');

// Books delete
Route::delete('/destroy/{id}', [BooksController::class, 'destroy'])->name('books.delete.destroy');
