<?php

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


Route::get('/', 'App\Http\Controllers\HomeController@home')->name('home')
// ->middleware('auth') => login before accessing this page
;
Route::get('/contact', 'App\Http\Controllers\HomeController@contact')->name('contact');
Route::get('/secret', 'App\Http\Controllers\HomeController@secret')->name('secret') ->middleware('can:home.secret');
Route::resource('/posts', 'App\Http\Controllers\PostController');

Auth::routes();

/*
Route::view('/', 'home.index')->name('home.index');
Route::view('/contact', 'home.contact')->name('home.contact');
Route::resource('posts', PostController::class)->only(['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']);
// Route::resource('posts', PostController::class)->except(['index', 'show']);

Route::get('/', [HomeController:: class, 'home'])->name('home.index');

Route::get('/contact', [HomeController:: class, 'contact'])->name('home.contact');

Route::get('/single', AboutController:: class);

// Route::get('/posts', function () use($posts) {
//     // dd(request()->all());
//     // posts?limit=10&page=5
//     dd((int)request()->query('page', 1));
//     return view('posts.index', ['posts' => $posts]);
// });

Route::get('/posts/{id}', function ($id) {
    $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_new' => true
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_new' => false
        ]
    ];

    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ['post' => $posts[$id]]);
})
// ->where([
//     'id' => '[0-9]+'
// ])
->name('posts.show');
Route::get('/recent-posts/{days_ago}', function ($daysAgo = 20) {
    return 'Posts from ' . $daysAgo . ' days ago';
})->name('posts.recent.index');



Route::prefix('/fun')->name('fun.')->group(function() use($posts) {
    Route::get('/responses', function () use($posts) {
    return response($posts, 201)->header('Content-Type', 'application/json')->cookie('MY_COOKIE', 'Joy Cheng', 3600);
    })->name('responses');

    Route::get('/back', function () {
        return back();
    })->name('back');

    Route::get('/named-route', function () {
        return redirect()->route('posts.show', ['id' => 1]);
    })->name('named-route');

    Route::get('/away', function () {
        return redirect()->away('https://google.com');
    })->name('away');

    Route::get('/json', function () use($posts) {
        return response()->json($posts);
    })->name('json');

    Route::get('/download', function () use($posts) {
        return response()->download(public_path(('shibaInu.jpg'), 'dog.jpg'));
    })->name('download');                 
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/