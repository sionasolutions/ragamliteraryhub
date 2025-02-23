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

});