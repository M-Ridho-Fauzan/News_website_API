<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Content\AllPostsController;
use App\Http\Controllers\Content\HomeController;
use App\Http\Controllers\Content\SinglePostController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/all-post', [AllPostsController::class, 'index'])->name('all-post');
Route::get('/all-post/single-post/{id}', [SinglePostController::class, 'index'])
    ->where('id', '.*')
    ->name('single-post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(SocialiteController::class)->group(function () {
    Route::group([
        'prefix' => '/auth/',
        'as' => 'socialite.',
    ], function () {
        Route::get('{provider}/redirect', 'redirect')->name('redirect');
        Route::get('{provider}/callback', 'callback')->name('callback');
    });
});

require __DIR__ . '/auth.php';
