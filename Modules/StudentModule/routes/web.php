<?php

use Illuminate\Support\Facades\Route;
use Modules\StudentModule\app\Http\Controllers\StudentModuleController;

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
    Route::resource('students', 'StudentController');
    Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
        Route::any('data/status-update/{id}', 'StudentController@status_update')->name('status-update');
        Route::any('data/verification-update/{id}', 'StudentController@verification_update')->name('verification-update');
    });
});
