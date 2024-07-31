<?php


/*

MVC - Model View Controller

Controller: Handle requests

Model: Handle data logic and interaction with database

View: What should be shown to the user (HTML and CSS / Blade files)

*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;


Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users', UserController::class)->only(['show', 'edit', 'update'])->middleware('auth');


Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::get(
    '/',
    [DashboardController::class, 'index']
)->name('dashboard');


Route::get(
    '/profiles',
    [ProfileController::class, 'profile']
);

Route::get(
    '/terms',
    function () {
        return view('terms');
    }
)->name('terms');
