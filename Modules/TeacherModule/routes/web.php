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
//teacher
Route::group(['namespace' => 'Teacher', 'prefix' => 'teacher', 'as' => 'teacher.'], function () {
    /*auth*/
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', 'LoginController@login')->name('login');
        Route::post('login', 'LoginController@submit')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout');
        Route::get('registration', 'RegistrationController@registration')->name('registration');
        Route::post('registration', 'RegistrationController@submit')->name('registration');
    });

    Route::group(['middleware' => 'teacher'], function () {
        //dashboard
        Route::get('/', 'DashboardController@dashboard')->name('dashboard');
        //follow request
        Route::group(['prefix' => 'follow-request', 'as' => 'follow-request.'], function() {
            Route::get('get', 'FollowRequestController@get')->name('get');
            Route::get('accept/{id}', 'FollowRequestController@accept')->name('accept');
            Route::delete('destroy/{id}', 'FollowRequestController@destroy')->name('destroy');
        });
        //blog
        Route::resource('blogs', 'BlogController');
        Route::group(['prefix' => 'blogs', 'as' => 'blogs.'], function () {
            Route::any('data/status-update/{id}', 'BlogController@status_update')->name('status-update');
        });
        //message
        Route::get('chat', 'MessageController@index')->name('chat');
        Route::get('message/{id}', 'MessageController@getMessage')->name('message');
        Route::post('message', 'MessageController@sendMessage');
    });
});
