<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\AppealControllers\DoubleMajorAppealController;
use App\Http\Controllers\AppealControllers\VerticalAppealController;
use App\Http\Controllers\Controller;

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

    Route::get('cap-basvuru', [DoubleMajorAppealController::class, 'index'])->name('doubleMajorAppeal');
    Route::get('dikey-gecis-basvuru', [VerticalAppealController::class, 'index'])->name('verticalAppeal');


    Route::get('cap-delete-file/{appealUUID}/{fileType}', [Controller::class, 'deleteFile'])->name('appealDeleteFile');
    Route::post('upload-file', [Controller::class, 'uploadFile'])->name('appealUploadFile');
    Route::post('basvuru-acilis-degistir', [Controller::class, 'changeAppealOpening'])->name('appealOpeningChange');
    Route::post('basvuru-kaydet', [Controller::class, 'storeAppeal'])->name('storeAppeal');
});
