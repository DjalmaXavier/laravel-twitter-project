<?php


/*

MVC - Model View Controller

Controller: Handle requests

Model: Handle data logic and interaction with database

View: What should be shown to the user (HTML and CSS / Blade files)

*/

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [DashboardController::class, 'index']
)->name('dashboard');

Route::get(
    '/ideas/{idea}',
    [IdeaController::class, 'show']
)->name('idea.show');

Route::get(
    '/ideas/{idea}/edit',
    [IdeaController::class, 'edit']
)->name('idea.edit');

Route::put(
    '/ideas/{idea}',
    [IdeaController::class, 'update']
)->name('idea.update');

Route::post(
    '/ideas',
    [IdeaController::class, 'store']
)->name('idea.store');

Route::post(
    '/ideas/{idea}/comments',
    [CommentController::class, 'store']
)->name('idea.comments.store');

Route::delete(
    '/ideas/{id}',
    [IdeaController::class, 'destroy']
)->name('idea.destroy');

Route::get(
    '/profiles',
    [ProfileController::class, 'profile']
);

Route::get(
    '/terms',
    function () {
        return view('terms');
    }
);
