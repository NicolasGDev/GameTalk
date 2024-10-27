<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



Route::get('/', [PostController::class, 'welcome'])->name('welcome');
// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified', 'can:dashboard'])->name('dashboard');

    Route::resource('user', UserController::class)->names('users.manage');
    Route::get('user/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::resource('category', CategoryController::class)->names('categories.manege');
    Route::resource('tag', TagController::class)->names('tags.manege');
    Route::resource('post', PostController::class)->names('posts.manege');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
// Ruta catch-all para devolver 404 dentro del dashboard
Route::fallback(function () {
    return response()->view('pages.utility.404');
})->middleware(['auth', 'can:dashboard']);


require __DIR__ . '/auth.php';
