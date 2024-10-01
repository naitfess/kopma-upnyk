<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    // return view('welcome');
});

Route::get('/register', function () {
    // return view('welcome');
});

Route::get('/announcement', function () {
    // return view('welcome');
});

Route::get('/dashboard', function () {
    // return view('welcome');
});

Route::get('/dashboard/psda/{file}', function () {
    // return view('welcome');
});

Route::get('/dashboard/keuangan/{file}', function () {
    // return view('welcome');
});
