<?php

use App\Http\Controllers\UserController;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/post_blog', function () {
        return view('blog_post');
    });
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    Route::get('/blog', function () {
        return view('display_blog');
    });
    
    Route::post('/blog_post',[UserController::class,'blog']); 
    Route::get('/blog',[UserController::class,'get_blog']); 
    
});


Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});



Route::post('/register', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

