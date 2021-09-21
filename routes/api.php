<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('post', PostController::class)->only(['index', 'show']);
Route::get('post/{category}/category', [PostController::class, 'category']);
Route::get('post/{url_clean}/url_clean', [PostController::class, 'url_clean']);
Route::get('category', [CategoryController::class, 'index']);
Route::get('category/all', [CategoryController::class, 'all']);
