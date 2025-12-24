<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::post('/post',[MainController::class,'generateExercises'])->name('generate');
Route::get('/show',[MainController::class,'showExercises'])->name('show');
Route::get('/export',[MainController::class,'exportExercises'])->name('export');
