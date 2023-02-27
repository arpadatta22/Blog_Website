<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZenBlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;


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

Route::get('/',[ZenBlogController::class,'index'])->name('home');
Route::get('/blog-detail/{slug}',[ZenBlogController::class,'blogDetail'])->name('blog.detail');
Route::get('/about-detail',[ZenBlogController::class,'aboutDetail'])->name('about.detail');
Route::get('/contact',[ZenBlogController::class,'contact'])->name('contact.detail');
Route::get('/blog-category/{catId}',[ZenBlogController::class,'category'])->name('blog.category');


Route::get('/user-register',[ZenBlogController::class,'userRegister'])->name('user.register');
Route::post('/user-register',[ZenBlogController::class,'saveUser'])->name('user.register');

Route::get('/user-login',[ZenBlogController::class,'loginUser'])->name('user.login');
Route::post('/user-login',[ZenBlogController::class,'checkLogin'])->name('user.login');
Route::get('/user-logout',[ZenBlogController::class,'logout'])->name('user.logout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::post('/new-category',[CategoryController::class,'saveCategory'])->name('new.category');

    Route::get('/author',[AuthorController::class,'index'])->name('author');
    Route::post('/new-author',[AuthorController::class,'saveAuthor'])->name('new.author');

    Route::get('/add-blog',[BlogController::class,'index'])->name('add.blog');
    Route::get('/manage-blog',[BlogController::class,'manageBlog'])->name('manage.blog');
    Route::post('/new-blog',[BlogController::class,'saveBlog'])->name('new.blog');
    Route::get('/status/{id}',[BlogController::class,'status'])->name('status');
    Route::post('/blog-delete',[BlogController::class,'blogDelete'])->name('blog.delete');
});


