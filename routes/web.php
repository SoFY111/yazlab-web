<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FirebaseController;

Route::group(['middleware' => 'isLogin'], function (){

    Route::get('giris-yap', function (){
        return view('login');
    })->name('login');

    Route::post('giris-yap', [FirebaseController::class, 'signIn'])->name('loginPost');

    Route::get('kayit-ol', function (){
        return view('register');
    })->name('register');
});

Route::group(['middleware' => 'isLogged'], function (){

    Route::get('/user-check', [FirebaseController::class, 'userCheck'])->name('userCheck');

    Route::get('/', function () {
        return view('ornk');
    })->name('dashboard');
});
