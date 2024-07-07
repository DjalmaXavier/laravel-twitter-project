<?php


/*

MVC - Model View Controller

Controller: Handle requests

Model: Handle data logic and interaction with database

View: What should be shown to the user (HTML and CSS / Blade files)

*/

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [DashboardController::class, 'index']
)->name('dashboard');

Route::post(
    '/idea',
    [IdeaController::class, 'store']
)->name('idea.create');

Route::get(
    '/profile',
    [ProfileController::class, 'profile']
);

Route::get(
    '/terms',
    function () {
        return view('terms');
    }
);
