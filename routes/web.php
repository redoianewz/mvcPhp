<?php

use ouaaz\Http\Route;

use App\Controllers\HomeController;

Route::get('/', function () {
    echo 'Hello World';
});
Route::get('/home',[HomeController::class,'index']);