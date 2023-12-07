<?php

use Illuminate\Support\Facades\Route;
use Modules\TeacherModule\app\Http\Controllers\TeacherModuleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'admin', 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('teachers', 'TeacherController');
    Route::group(['prefix' => 'teachers', 'as' => 'teachers.'], function () {
        Route::any('data/status-update/{id}', 'TeacherController@status_update')->name('status-update');
        Route::any('data/verification-update/{id}', 'TeacherController@verification_update')->name('verification-update');
    });
});
