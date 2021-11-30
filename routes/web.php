<?php

use Illuminate\Support\Facades\Route;

Route::get('giris-yap', function (){
    return view('login');
})->name('login');

Route::get('kayit-ol', function (){
    return view('register');
})->name('register');

Route::get('/', function () {
    return view('welcome');
});
