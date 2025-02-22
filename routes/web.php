<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/admin/blog', [BlogController::class, 'index'])->name('Admin.blog');
    Route::post('/gallery/{id}/toggle-status', [BlogController::class, 'toggleStatus']);
    Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('Admin.blog.create');
    Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('Admin.blog.store');
    Route::get('/admin/blog/{id}/edit', [BlogController::class, 'edit'])->name('Admin.blog.edit');
    Route::post('/admin/blog/{id}/update', [BlogController::class, 'update'])->name('Admin.blog.update');
    Route::get('/admin/blog/{id}/delete', [BlogController::class, 'delete'])->name('Admin.blog.delete');

});