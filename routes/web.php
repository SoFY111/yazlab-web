<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FirebaseController;

Route::get('giris-yap', function (){
    return view('login');
})->name('login');

Route::post('giris-yap', [FirebaseController::class, 'signIn'])->name('loginPost');



Route::get('kayit-ol', function (){
    return view('register');
})->name('register');

Route::get('/h', function (){
    return '22';
})->name('home');

Route::get('/', function () {
    return view('welcome');
})->name('dashboard');
