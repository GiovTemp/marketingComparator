<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/questions', [App\Http\Controllers\HomeController::class, 'showQuestions'])->name('questions');

Route::post('/getPromo', [App\Http\Controllers\HomeController::class, 'getPromo']);


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


        Route::get('/viewPromo/id={id}', 'showViewPromo')->name('viewPromo');
        Route::get('/deletePromo/id={id}', 'deletePromo')->name('deletePromo');
        Route::get('/editPromo/id={id}', 'showEditPromo')->name('editPromo');
        Route::post('/editPromo', 'editPromo');

        Route::get('/createPromo', 'showCreatePromo');
        Route::post('/createPromo', 'createPromo');
    });
});
