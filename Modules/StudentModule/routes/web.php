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
//admin
Route::group(['middleware' => 'admin', 'namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('students', 'StudentController');
    Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
        Route::any('data/status-update/{id}', 'StudentController@status_update')->name('status-update');
        Route::any('data/verification-update/{id}', 'StudentController@verification_update')->name('verification-update');
    });
});
//student
Route::group(['namespace' => 'Student', 'prefix' => 'student', 'as' => 'student.'], function () {
    /*auth*/
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', 'LoginController@login')->name('login');
        Route::post('login', 'LoginController@submit')->name('login-submit');
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::get('registration', 'RegistrationController@registration')->name('registration');
        Route::post('registration', 'RegistrationController@submit')->name('registration');
    });

    Route::get('teachers-list', 'FrontendController@teachers_list')->name('teachers-list');
});
