<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//auth
Route::post('auth/login/', 'AuthController@login');
Route::post('auth/register/', 'AuthController@register');

//dashboard

//project

//filters

//feedback
