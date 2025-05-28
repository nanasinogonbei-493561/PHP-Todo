<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function index()
    {
        $todos = Todo::all(); // 空でもコレクションになる
        return view('todos.index', compact('todos'));
    }
}
