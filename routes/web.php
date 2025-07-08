<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect()->route('todos.index');
});

Route::resource('todos', TodoController::class)->except(['show']);
Route::resource('categories', CategoryController::class)->except(['show']);
