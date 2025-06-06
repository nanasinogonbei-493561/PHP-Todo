<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return redirect()->route('todos.index');
});

Route::resource('todos', TodoController::class)->except(['show']);

Route::get('/', function () {
    return view('todos.index');
});
