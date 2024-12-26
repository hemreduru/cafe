<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.master');
});
Route::get('/example', function () {
    return view('layout.example');
});
