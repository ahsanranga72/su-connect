<?php

use Illuminate\Support\Facades\Route;
use Modules\FrontendModule\app\Http\Controllers\FrontendModuleController;

Route::get('/', function() {
    return view('frontendmodule::layouts.master');
});