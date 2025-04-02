<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Show login form
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login request
Route::post('login', [LoginController::class, 'login']);

// Logout route
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard route
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('Admin.dashboard');

    // Blog routes
    Route::get('/admin/blog/index', [BlogController::class, 'index'])->name('Admin.blog.index');
    Route::post('/admin/blog/{id}/toggleStatus', [BlogController::class, 'toggleStatus']);
    Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('Admin.blog.create');
    Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('Admin.blog.store');
    Route::get('/admin/blog/{id}/edit', [BlogController::class, 'edit'])->name('Admin.blog.edit');
    Route::put('/admin/blog/{id}/update', [BlogController::class, 'update'])->name('Admin.blog.update');
    Route::delete('/admin/blog/{id}/destroy', [BlogController::class, 'destroy'])->name('Admin.blog.destroy');
    Route::patch('/admin/blog/{id}/restore', [BlogController::class, 'restore'])->name('Admin.blog.restore');
    Route::get('/admin/blog/{id}/force-delete', [BlogController::class, 'forceDelete'])->name('Admin.blog.force-delete');
    Route::get('admin/blog/archived', [BlogController::class, 'archived'])->name('Admin.blog.archived');

    // Book routes
    Route::get('/admin/book/index', [BookController::class, 'index'])->name('Admin.book.index');
    Route::post('/admin/book/{id}/toggleStatus', [BookController::class, 'toggleStatus']);
    Route::get('/admin/book/create', [BookController::class, 'create'])->name('Admin.book.create');
    Route::post('/admin/book/store', [BookController::class, 'store'])->name('Admin.book.store');
    Route::get('/admin/book/{id}/edit', [BookController::class, 'edit'])->name('Admin.book.edit');
    Route::put('/admin/book/{id}/update', [BookController::class, 'update'])->name('Admin.book.update');
    Route::delete('/admin/book/{id}/destroy', [BookController::class, 'destroy'])->name('Admin.book.destroy');
    Route::patch('/admin/book/{id}/restore', [BookController::class, 'restore'])->name('Admin.book.restore');
    Route::get('/admin/book/{id}/force-delete', [BookController::class, 'forceDelete'])->name('Admin.book.force-delete');
    Route::get('admin/book/archived', [BookController::class, 'archived'])->name('Admin.book.archived');


    // News routes
    Route::get('/admin/news/index', [NewsController::class, 'index'])->name('Admin.news.index');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('Admin.news.create');
    Route::post('/admin/news/store', [NewsController::class, 'store'])->name('Admin.news.store');
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('Admin.news.edit');
    Route::put('/admin/news/{id}/update', [NewsController::class, 'update'])->name('Admin.news.update');
    Route::delete('/admin/news/{id}/destroy', [NewsController::class, 'destroy'])->name('Admin.news.destroy');

    // Media routes
    Route::get('/admin/media/index', [MediaController::class, 'index'])->name('Admin.media.index');
    Route::get('/admin/media/create', [MediaController::class, 'create'])->name('Admin.media.create');
    Route::post('/admin/media/store', [MediaController::class, 'store'])->name('Admin.media.store');
    Route::get('/admin/media/{id}/edit', [MediaController::class, 'edit'])->name('Admin.media.edit');
    Route::put('/admin/media/{id}/update', [MediaController::class, 'update'])->name('Admin.media.update');
    Route::delete('/admin/media/{id}/destroy', [MediaController::class, 'destroy'])->name('Admin.media.destroy');


    //category routes
    Route::resource('/admin/categories', CategoryController::class)->names([
        'index' => 'Admin.categories.index',
        'create' => 'Admin.categories.create',
        'store' => 'Admin.categories.store',
        'show' => 'Admin.categories.show',
        'edit' => 'Admin.categories.edit',
        'update' => 'Admin.categories.update',
        'destroy' => 'Admin.categories.destroy',
    ]);

    //work routes
    Route::get('/admin/works/archived', [WorkController::class, 'archived'])->name('Admin.works.archived');
    Route::post('/works/{id}/restore', [WorkController::class, 'restore'])->name('Admin.works.restore');
    Route::delete('/works/{id}/force-delete', [WorkController::class, 'forceDelete'])->name('Admin.works.forceDelete');
    Route::resource('/admin/works', WorkController::class)->names([
        'index' => 'Admin.works.index',
        'create' => 'Admin.works.create',
        'store' => 'Admin.works.store',
        'show' => 'Admin.works.show',
        'edit' => 'Admin.works.edit',
        'update' => 'Admin.works.update',
        'destroy' => 'Admin.works.destroy',
    ]);
    // Add this after the resource route
    Route::post('/admin/works/{work}/toggleStatus', [WorkController::class, 'toggleStatus'])->name('Admin.works.toggleStatus');
});


//blogs view routes
// Route::get('/blogs', [BlogController::class, 'blogs'])->name('User.blog.blogview');
// Route::get('/blogs/{slug}', [BlogController::class, 'blog'])->name('User.blog.show');

// Works View Routes
Route::get('/works', [WorkController::class, 'works'])->name('User.works.index'); // List all categories
Route::get('/works/all-categories', [WorkController::class, 'allCategories'])->name('User.works.all-categories'); // All categories
Route::get('/works/{category}', [WorkController::class, 'work'])->name('User.works.category'); // Works in a category
Route::get('/works/{category}/{work}', [WorkController::class, 'show'])->name('User.works.show'); // Single work details

// books view routes
// Route::get('/books', [BookController::class, 'booksview'])->name('User.book.bookview');

//news view routes
Route::get('/news', [NewsController::class, 'newsview'])->name('User.news.show');

//email route
Route::post('/email', [HomeController::class, 'email'])->name('User.email');

