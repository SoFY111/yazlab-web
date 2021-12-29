<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\AppealControllers\DoubleMajorAppealController;

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
    Route::get('/cikis-yap', [FirebaseController::class, 'signOut'])->name('logOut');

    Route::get('/', function () {
        return view('ornk');
    })->name('dashboard');

    Route::get('capbasvuru', [DoubleMajorAppealController::class, 'index'])->name('doubleMajorAppeal');
});
