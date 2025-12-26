<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Route::redirect('/admin', '/admin/login');
    //return view('welcome');
});
