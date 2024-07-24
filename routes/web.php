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
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'ideas',
    'as' => 'idea.',
], function () {

    Route::post(
        '',
        [IdeaController::class, 'store']
    )->name('store');

    Route::get(
        '/{idea}',
        [IdeaController::class, 'show']
    )->name('show');


    Route::group([
        'middleware' => ['auth']
    ], function () {
        Route::get(
            '/{idea}/edit',
            [IdeaController::class, 'edit']
        )->name('edit');

        Route::put(
            '/{idea}',
            [IdeaController::class, 'update']
        )->name('update');

        Route::delete(
            '/{id}',
            [IdeaController::class, 'destroy']
        )->name('destroy');

        Route::post(
            '/ideas/{idea}/comments',
            [CommentController::class, 'store']
        )->name('comments.store');
    });
});

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
