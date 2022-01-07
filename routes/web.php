<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\AppealControllers\DoubleMajorAppealController;
use App\Http\Controllers\AppealControllers\VerticalAppealController;
use App\Http\Controllers\AppealControllers\HorizontalAppealController;
use App\Http\Controllers\AppealControllers\SummerSchoolAppealController;
use App\Http\Controllers\AppealControllers\ClassAdaptationAppealController;
use App\Http\Controllers\Controller;

Route::group(['middleware' => 'isLogin'], function (){

    Route::get('giris-yap', function (){
        return view('login');
    })->name('login');

    Route::post('giris-yap', [FirebaseController::class, 'signIn'])->name('loginPost');

    Route::get('kayit-ol', [FirebaseController::class, 'signUpGet'])->name('register');
    Route::post('kayit-ol', [FirebaseController::class, 'signUpPost'])->name('signUp');
});

Route::group(['middleware' => 'isLogged'], function (){

    Route::get('/user-check', [FirebaseController::class, 'userCheck'])->name('userCheck');
    Route::get('/cikis-yap', [FirebaseController::class, 'signOut'])->name('logOut');

    Route::get('/', [Controller::class, 'index'])->name('dashboard');

    Route::get('cap-basvuru', [DoubleMajorAppealController::class, 'index'])->name('doubleMajorAppeal');
    Route::get('dikey-gecis-basvuru', [VerticalAppealController::class, 'index'])->name('verticalAppeal');
    Route::get('yatay-gecis-basvuru', [HorizontalAppealController::class, 'index'])->name('horizontalAppeal');
    Route::get('yaz-okulu-basvuru', [SummerSchoolAppealController::class, 'index'])->name('summerSchoolAppeal');
    Route::get('ders-intibak-basvuru', [ClassAdaptationAppealController::class, 'index'])->name('classAdaptation');

    Route::get('basvuru-goruntule/{appealUUID}', [Controller::class, 'showAppeal'])->name('showAppeal');

    Route::post('answer-appeal', [Controller::class, 'answerAppeal'])->name('answerAppeal');

    Route::get('cap-delete-file/{appealUUID}/{fileType}', [Controller::class, 'deleteFile'])->name('appealDeleteFile');
    Route::post('upload-file', [Controller::class, 'uploadFile'])->name('appealUploadFile');
    Route::post('basvuru-acilis-degistir', [Controller::class, 'changeAppealOpening'])->name('appealOpeningChange');
    Route::post('basvuru-kaydet', [Controller::class, 'storeAppeal'])->name('storeAppeal');
});
