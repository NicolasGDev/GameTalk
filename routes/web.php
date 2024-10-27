<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;



Route::get('/', [PageController::class, 'showHome'])->name('home');
Route::get('/posts/{id}', [PageController::class, 'showPost'])->name('page.show');
Route::post('/comment/store', [CommentController::class, 'storeComment'])->name('comment.store');
Route::put('/comment/{id}', [CommentController::class, 'reportComment'])->name('comment.report');
Route::get('/reportedComments', [CommentController::class, 'index'])->name('comment.index');
Route::delete('/deleteComment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
Route::put('/allowComment/{id}', [CommentController::class, 'commentAllow'])->name('comment.allow');
// Rutas para autenticación con Google
Route::get('/google-auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-auth/callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();
    $user = User::updateOrCreate([
        'google_id' => $user_google->id,
    ], [
        'name' => $user_google->name,
        'email' => $user_google->email,
        'profile_picture' => $user->profile_picture ?? $user_google->getAvatar(),
    ]);

    Auth::login($user);
    return redirect('/');
});


// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified', 'can:dashboard'])
        ->name('dashboard');



    Route::get('user/logout', [UserController::class, 'logout'])->name('user.logout');

    Route::resource('category', CategoryController::class)->names('categories.manage');
    Route::resource('user', UserController::class)->names('users.manage');
    Route::resource('tag', TagController::class)->names('tags.manage');
    Route::resource('post', PostController::class)->names('posts.manage');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta catch-all para devolver 404 dentro del dashboard
Route::fallback(function () {
    return response()->view('pages.utility.404');
})->middleware(['auth', 'can:dashboard']);


require __DIR__ . '/auth.php';
