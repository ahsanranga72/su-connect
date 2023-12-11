<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminModule\app\Http\Controllers\AdminModuleController;

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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    /*auth*/
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function () {
        Route::get('login', 'LoginController@login')->name('login');
        Route::post('login', 'LoginController@submit');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });

    Route::group(['middleware' => ['admin']], function () {
        Route::resource('assistants', 'AssistantController');
        Route::group(['prefix' => 'assistants', 'as' => 'assistants.'], function () {
            Route::put('update-password/{id}', 'AssistantController@update_password')->name('update-password');
            Route::any('data/status-update/{id}', 'AssistantController@status_update')->name('status-update');
            Route::any('data/verification-update/{id}', 'AssistantController@verification_update')->name('verification-update');
        });
        Route::get('/', 'DashboardController@index')->name('dashboard');
    });
});
