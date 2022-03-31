<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('admin')->group(function () {
    Route::controller(App\Http\Controllers\AdminController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/createQuestion', 'showCreateQuestion');
        Route::post('/createQuestion', 'createQuestion');
        Route::get('/deleteQuestion/id={id}', 'deleteQuestion')->name('deleteQuestion');
        Route::get('/editQuestion/id={id}', 'showEditQuestion')->name('editQuestion');
        Route::post('/editQuestion', 'editQuestion');
        Route::get('/viewQuestion/id={id}', 'showViewQuestion')->name('viewQuestion');
        Route::get('/upQuestion/id={id}&pos={pos}', 'upQuestion')->name('upQuestion');
        Route::get('/downQuestion/id={id}&pos={pos}', 'downQuestion')->name('downQuestion');
    });
});
