<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;

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


Route::controller(PromotionController::class)->group(function () {
    Route::get('promociones', 'index')->name('promotions');
    Route::get('agregar-promocion', 'create')->name('addPromotion.create');
    Route::post('agregar-promocion', 'store')->name('addPromotion.store');
    Route::get('editar-promocion/{id}', 'edit')->name('editPromotion.edit');
    Route::put('editar-promocion/{id}', 'update')->name('editPromotion.update');
    Route::put('editar-promocion/{id}', 'update')->name('editPromotion.update');
    Route::delete('eliminar-promocion/{id}', 'destroy')->name('deletePromotion.destroy');
});
