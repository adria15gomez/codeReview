<?php

use App\Http\Controllers\CompetenceController;
use App\Models\Competence;
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

Route::controller(CompetenceController::class)->group(function() {
    Route::get('competence', 'index')->name('competence');
    Route::get('agregar-competencia', 'create')->name('addCompetence.create');
    Route::post('agregar-competencia', 'store')->name('addCompetence.store');
    Route::get('editar-competencia/{id}', 'edit')->name('editCompetence.edit');
    Route::put('editar-competencia/{id}', 'update')->name('editCompetence.update');
    Route::put('editar-competencia/{id}', 'update')->name('editCompetence.update');
    Route::delete('eliminar-competencia/{id}', 'destroy')->name('deleteCompetence.distroy');
});