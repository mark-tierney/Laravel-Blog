<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

$posts = [
    1 => [
      'title' => 'Intro to Laravel',
      'content' => 'This is a short intro to Laravel',
      'is_new' => true,
      'has_comments' => true
    ],
    2 => [
      'title' => 'Intro to PHP',
      'content' => 'This is a short intro to PHP',
      'is_new' => false
    ],
    3 => [
      'title' => 'Intro to Golang',
      'content' => 'This is a short intro to Golang',
      'is_new' => false
    ]
  ];

//home routes

Route::get('/', [HomeController::class, 'home'])->name('home.index');

// Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/single', AboutController::class);

//post routes

Route::resource('posts', PostsController::class);
    //->only(['index', 'show', 'create', 'store', 'edit', 'update']);

Route::get('/recent-posts/{days_ago?}', function($daysAgo = 20) {
    return 'Posts from ' . $daysAgo . ' days ago';
})->name('posts.recent.index')->middleware('auth');

//fun routes

Route::prefix('/fun')->name('fun.')->group(function() use($posts) {
    Route::get('responses', function() use($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('MY_COOKIE', 'Piotr Jura', 3600);
    })->name('responses');

    Route::get('redirect', function() {
        return redirect('/contact');
    })->name('redirect');

    Route::get('back', function() {
        return back();
    })->name('back');

    Route::get('named-route', function() {
        return redirect()->route('posts.show', ['id' => 1]);
    })->name('named-route');

    Route::get('away', function() {
        return redirect()->away('https://pseudocorp.net');
    })->name('away');

    Route::get('json', function() use($posts) {
        return response()->json($posts);
    })->name('json');

    Route::get('download', function() use($posts) {
        return response()->download(public_path('/daniel.jpg'), 'face.jpg');
    })->name('download');
});







