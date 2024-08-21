<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HeadlineController;

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

Route::get('/',[PostController::class,'index']);
Route::get('/post/data', [PostController::class, 'data']);
Route::get('/post/create',[PostController::class,'create']);
Route::post('post',[PostController::class,'store']);
Route::get('/post/show/{id}',[PostController::class,'show']);
Route::get('/post/edit/{id}',[PostController::class,'edit']);
Route::post('update/{id}',[PostController::class,'update']);
Route::delete('delete/{id}',[PostController::class,'destroy']);

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/category/data', [CategoryController::class, 'data'])->name('category.data');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('delete/{id}',[CategoryController::class,'destroy']);

Route::get('/headline/create', [HeadlineController::class, 'create'])->name('headline.create');
Route::post('/headlines', [HeadlineController::class, 'store'])->name('headlines.store');
Route::get('/headline/data', [HeadlineController::class, 'data'])->name('headline.data');
Route::get('/headline/edit/{id}', [HeadlineController::class, 'edit'])->name('headline.edit');
Route::post('/headline/update/{id}', [HeadlineController::class, 'update'])->name('headline.update');
Route::delete('delete/{id}',[HeadlineController::class,'destroy']);