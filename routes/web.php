<?php

use App\Http\Controllers\CoderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\EvaluationController;

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
    return view('superadmin');
});

// Aquí cambiamos para que cuando entremos a la web automáticamente nos redirija a la view de login
Route::get('/', function () {
    return view('auth.login');
});

// Para poder visualizar la view de Register
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/users/assign-role', [UserController::class, 'assignRole'])->name('users.assign-role');

require __DIR__ . '/auth.php';

Route::controller(CompetenceController::class)->group(function () {
    Route::get('competencias', 'index')->name('competence');
    Route::get('agregar-competencia', 'create')->name('addCompetence.create');
    Route::post('agregar-competencia', 'store')->name('addCompetence.store');
    Route::get('editar-competencia/{id}', 'edit')->name('editCompetence.edit');
    Route::put('editar-competencia/{id}', 'update')->name('editCompetence.update');
    Route::put('editar-competencia/{id}', 'update')->name('editCompetence.update');
    Route::delete('eliminar-competencia/{id}', 'destroy')->name('deleteCompetence.distroy');
});

Route::controller(TopicController::class)->group(function () {
    Route::get('topic', 'index')->name('topic');
    Route::get('agregar-topic', 'create')->name('addTopic.create');
    Route::post('agregar-topic', 'store')->name('addTopic.store');
    Route::get('editar-topic/{id}', 'edit')->name('editTopic.edit');
    Route::put('editar-topic/{id}', 'update')->name('editTopic.update');
    Route::put('editar-topic/{id}', 'update')->name('editTopic.update');
    Route::delete('eliminar-topic/{id}', 'destroy')->name('deleteTopic.distroy');
});

// Route::get('/bootcamps', function () {
//     return view('layouts.bootcamps');
// });

// Route::get('/coders', function () {
//     return view('trainer.coders');
// });
Route::get('/coder-detail', function () {
    return view('trainer.coderDetail');
});

Route::get('/agregar-coder', function () {
    return view('trainer.agregarCoder');
});

Route::get('/editar-coder', function () {
    return view('trainer.editarCoder');
});

// Route::get('/bootcamp-detail', function () {
//     return view('trainer.bootcampDetail');
// });

Route::controller(PromotionController::class)->group(function () {
    Route::get('/promociones', 'index')->name('trainer.promotions');
    Route::get('agregar-promocion', 'create')->name('addPromotion.create');
    Route::post('agregar-promocion', 'store')->name('addPromotion.store');
    Route::get('editar-promocion/{promotion}', 'edit')->name('editPromotion.edit');
    Route::put('editar-promocion/{promotion}', 'update')->name('editPromotion.update');
    Route::get('bootcamp-detail', 'showTrainer')->name('promotions.show');
    Route::get('mi-bootcamp', 'showCoder')->name('promotions.showCoder');
    Route::delete('eliminar-promocion/{promotion}', 'destroy')->name('deletePromotion.destroy');
});

Route::post('/users/assign-role', [UserController::class, 'assignRole'])->name('users.assign-role');

Route::get('/resultados-evaluacion', function () {
    return view('coder.resultadosEvaluacion');
});

Route::get('/rating-autoevaluacion', function () {
    return view('components.ratingAutoevaluacion');
});

Route::get('/rating-autoevaluacion', function () {
    return view('components.ratingAutoevaluacion');
});

Route::controller(EvaluationController::class)->group(function () {
    Route::get('mis-evaluaciones', 'dashboard')->name('evaluations');
    Route::get('mi-historico-evaluaciones', 'index')->name('evaluations.index');
    Route::get('autoevaluacion', 'create')->name('evaluation.create');    
    Route::post('evaluacion', 'store')->name('evaluation.store');
    Route::get('coevaluacion', 'createCoevalua')->name('evaluation.createCoevalua');
    Route::post('coevaluacion', 'store')->name('evaluation.store');
    Route::get('resultados-evaluacion', 'show')->name('evaluationResults.show');
    Route::get('evaluacion/{user_id}/{date}', 'compare')->name('coder.comparison');
});

Route::controller(CoderController::class)->group(function () {
    Route::get('coders', 'index')->name('coders');
});