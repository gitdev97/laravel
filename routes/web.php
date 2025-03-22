<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('api')->group(function () {
    Route::post('/records', [\App\Http\Controllers\PostsController::class, 'getPosts']);
});
