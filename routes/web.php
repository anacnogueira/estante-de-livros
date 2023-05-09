<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BookImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect()->route('admin.book.index');
});


/* Authors */
Route::group(['prefix'=>'autores'], function(){
   Route::get('/', [AuthorsController::class,'index'])->name('admin.author.index');
   Route::get('ver/{id}', [AuthorsController::class,'show'])->name('admin.author.show');
   Route::get('adicionar', [AuthorsController::class,'create'])->name('admin.author.create');
   Route::post('store', [AuthorsController::class,'store'])->name('admin.author.store');
   Route::get('editar/{id}', [AuthorsController::class,'edit'])->name('admin.author.edit');
   Route::put('update/{id}', [AuthorsController::class,'update'])->name('admin.author.update');
   Route::delete('excluir/{id}', [AuthorsController::class,'destroy'])->name('admin.author.destroy');
});

/* Categories */
Route::group(['prefix'=>'categorias'], function(){
   Route::get('/', [CategoriesController::class,'index'])->name('admin.category.index');
   Route::get('ver/{id}', [CategoriesController::class,'show'])->name('admin.category.show');
   Route::get('adicionar', [CategoriesController::class,'create'])->name('admin.category.create');
   Route::post('store', [CategoriesController::class,'store'])->name('admin.category.store');
   Route::get('editar/{id}', [CategoriesController::class,'edit'])->name('admin.category.edit');
   Route::put('update/{id}', [CategoriesController::class,'update'])->name('admin.category.update');
   Route::delete('excluir/{id}', [CategoriesController::class,'destroy'])->name('admin.category.destroy');
});


/* Books */
Route::group(['prefix'=>'livros'], function(){
   Route::get('/', [BooksController::class, 'index'])->name('admin.book.index');
   Route::get('ver/{id}', [BooksController::class,'show'])->name('admin.book.show');
   Route::get('adicionar', [BooksController::class,'create'])->name('admin.book.create');
   Route::post('store', [BooksController::class,'store'])->name('admin.book.store');
   Route::get('editar/{id}', [BooksController::class,'edit'])->name('admin.book.edit');
   Route::put('update/{id}', [BooksController::class,'update'])->name('admin.book.update');
   Route::delete('excluir/{id}', [BooksController::class,'destroy'])->name('admin.book.destroy');
   Route::get('a-ser-lido', [BooksController::class,'toBeRead'])->name('admin.book.to-be-read');
   //Route::post('{id}/file', [BookImageController::class,'store'])->name('admin.book-image.index');
});

Auth::routes();

