<?php

use Illuminate\Support\Facades\Route;

use function Pest\Laravel\get;

Route::get('/','App\Http\Controllers\RelacionController@index');

