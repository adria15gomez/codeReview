<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Estas rutas son para poder visualizar los layouts, luego deben borrarse
Route::get('/layout-coder', function () {
    return view('layouts.coder');
});

Route::get('/layout-formador', function () {
    return view('layouts.formador');
});

Route::get('/layout-superadmin', function () {
    return view('layouts.superadmin');
});

Route::get('/mi-bootcamp', function () {
    return view('miBootcamp');
});

Route::get('/bootcamps', function () {
    return view('layouts.bootcamps');
});
