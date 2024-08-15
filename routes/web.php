<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, 'firstFunction']);
// Route::get('/test_page', ['App\Http\Controllers\TestController', 'firstFunction']);
// echo TestController::class; // fa meaning of el satr dh yesawi App\Http\Controllers\TestController bs kda !


// Route::get('/last', function () {
//     return view('new_page');
// }); i will use controller instead of writing code in route

Route::get('/posts', [PostsController::class, 'index'])->name("posts.index"); // sami el name zy ma 2nta 3ayez 3ady bs el 4akl dh howa el commonly used between developers
// Route::get('/posts/create', function () {
//     return view('posts.create');
// });
Route::get('/posts/create', [PostsController::class, 'create'])->name("posts.create");
Route::get('/posts/{postId}', [PostsController::class, 'show'])->name("posts.show");
Route::post('/posts', [PostsController::class, 'store'])->name("posts.store");
Route::get('/posts/{postId}/edit', [PostsController::class, 'edit'])->name("posts.edit");
Route::put('/posts/{post}', [PostsController::class, 'update'])->name("posts.update");
Route::delete('/posts/{postId}', [PostsController::class, 'destroy'])->name("posts.destroy");
