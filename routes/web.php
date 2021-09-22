<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\WebController;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\CategoriesController;
use App\Http\Controllers\dashboard\PostCommentController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/categories', [WebController::class, 'categories']);
Route::get('/detail/{id}', [WebController::class, 'detail']);
Route::get('/post-category/{id}', [WebController::class, 'post_category']);
Route::get('/contact', [WebController::class, 'contact']);

// Route::get('dashboard/posts', [PostController::class, 'index'])->name('index');
Route::resource('dashboard/posts', PostController::class);
Route::post('dashboard/posts/{post}/image', [PostController::class, 'image'])->name('posts.image');
Route::post('dashboard/posts/content_image', [PostController::class, 'contentImage']);

Route::resource('dashboard/categories', CategoriesController::class);

Route::resource('dashboard/users', UserController::class);

Route::resource('dashboard/contact', ContactController::class)->only(['index', 'show', 'destroy']);
Route::resource('dashboard/post-comment', PostCommentController::class)->only(['index', 'show', 'destroy']);

Route::get('dashboard/post-comment/{post}/post', [PostCommentController::class, 'post'])->name('post-comment.post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
