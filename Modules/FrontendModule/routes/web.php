<?php

use Illuminate\Support\Facades\Route;
use Modules\FrontendModule\app\Http\Controllers\FrontendModuleController;
use Modules\FrontendModule\app\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'home'])->name('home');