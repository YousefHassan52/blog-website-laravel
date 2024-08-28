<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestController::class, 'firstFunction']);
// Route::get('/test_page', ['App\Http\Controllers\TestController', 'firstFunction']);
// echo TestController::class; // fa meaning of el satr dh yesawi App\Http\Controllers\TestController bs kda !


// Route::get('/last', function () {
//     return view('new_page');
// }); i will use controller instead of writing code in route

Route::get('/posts', [PostsController::class, 'index'])->name("posts.index")->middleware('auth'); // sami el name zy ma 2nta 3ayez 3ady bs el 4akl dh howa el commonly used between developers
// Route::get('/posts/create', function () {
//     return view('posts.create');
// });
Route::get('/posts/create', [PostsController::class, 'create'])->name("posts.create")->middleware('auth');
Route::get('/posts/{post}', [PostsController::class, 'show'])->name("posts.show")->middleware('auth');
Route::post('/posts', [PostsController::class, 'store'])->name("posts.store")->middleware('auth');
Route::get('/posts/{postId}/edit', [PostsController::class, 'edit'])->name("posts.edit")->middleware('auth');
Route::put('/posts/{post}', [PostsController::class, 'update'])->name("posts.update")->middleware('auth');
Route::delete('/posts/{postId}', [PostsController::class, 'destroy'])->name("posts.destroy")->middleware('auth');


//comments----------------------------------------------------- 
Route::get('/posts/{post}/comments/{comment}/edit', [CommentsController::class, 'edit'])->name('comments.edit')->middleware('auth');
Route::post('/posts/{post}/comments', [CommentsController::class, 'store'])->name('comments.store')->middleware('auth');
Route::delete('/posts/{post}/comments/{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy')->middleware('auth');
Route::put('/posts/{post}/comments/{comment}', [CommentsController::class, 'update'])->name('comments.update')->middleware('auth');


//auth----------------------------------------------------- 
//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');



// admin 
Route::get('/admin', [AdminController::class, 'index'])->name("admin.index")->middleware(['auth', 'role:admin']); // sami el name zy ma 2nta 3ayez 3ady bs el 4akl dh howa el commonly used between developers
