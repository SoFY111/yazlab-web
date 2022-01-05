<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\AppealControllers\DoubleMajorAppealController;
use App\Http\Controllers\AppealControllers\SummerSchoolController;
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
    Route::get('yazokulu-basvuru', [SummerSchoolController::class, 'index'])->name('summerSchoolAppeal');


    Route::get('cap-delete-file/{appealUUID}/{fileType}', [Controller::class, 'deleteFile'])->name('doubleMajorAppealDeleteFile');
    Route::post('upload-file', [Controller::class, 'uploadFile'])->name('doubleMajorAppealUploadFile');
    Route::post('basvuru-acilis-degistir', [Controller::class, 'changeAppealOpening'])->name('appealOpeningChange');
});
