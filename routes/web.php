<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\PostTagController;
use App\Http\Controllers\PostCommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/secret', [HomeController::class, 'secret'])->name('home.secret')->middleware('can:home.secret');
Route::get('/posts/tag/{tag}', [PostTagController::class, 'index'])->name('posts.tags.index');
Route::resource('posts', PostsController::class);

Route::resource('posts.comments', PostCommentController::class)->only(['store']);


Auth::routes();







