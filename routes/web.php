<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CoderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\TrainerController;

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

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(CompetenceController::class)->group(function () {
    Route::get('competencias', 'index')->name('competence')->middleware('auth');
    Route::get('agregar-competencia', 'create')->name('addCompetence.create')->middleware('auth');
    Route::post('agregar-competencia', 'store')->name('addCompetence.store');
    Route::get('editar-competencia/{id}', 'edit')->name('editCompetence.edit')->middleware('auth');
    Route::put('editar-competencia/{id}', 'update')->name('editCompetence.update');
    Route::delete('eliminar-competencia/{id}', 'destroy')->name('deleteCompetence.distroy');
});

Route::controller(TopicController::class)->group(function () {
    Route::get('topic', 'index')->name('topic')->middleware('auth');
    Route::get('agregar-topic', 'create')->name('addTopic.create')->middleware('auth');
    Route::post('agregar-topic', 'store')->name('addTopic.store');
    Route::get('editar-topic/{id}', 'edit')->name('editTopic.edit')->middleware('auth');
    Route::put('editar-topic/{id}', 'update')->name('editTopic.update');
    Route::delete('eliminar-topic/{id}', 'destroy')->name('deleteTopic.distroy');
});

Route::controller(PromotionController::class)->group(function () {
    Route::get('/promociones', 'index')->name('trainer.promotions')->middleware('auth');
    Route::get('agregar-promocion', 'create')->name('addPromotion.create')->middleware('auth');
    Route::post('agregar-promocion', 'store')->name('addPromotion.store');
    Route::get('editar-promocion/{promotion}', 'edit')->name('editPromotion.edit')->middleware('auth');
    Route::put('editar-promocion/{promotion}', 'update')->name('editPromotion.update');
    Route::get('bootcamp-detail/{promotion}', 'showTrainer')->name('promotions.show')->middleware('auth');
    Route::get('mi-bootcamp', 'showCoder')->name('promotions.showCoder')->middleware('auth');
    Route::delete('eliminar-promocion/{promotion}', 'destroy')->name('deletePromotion.destroy');
});

Route::controller(EvaluationController::class)->group(function () {
    Route::get('mis-evaluaciones', 'dashboard')->name('evaluations')->middleware('auth');
    Route::get('mi-historico-evaluaciones', 'index')->name('evaluations.index')->middleware('auth');
    Route::get('autoevaluacion', 'create')->name('evaluation.create')->middleware('auth');
    Route::post('evaluacion', 'store')->name('evaluation.store');
    Route::get('coevaluacion', 'createCoevalua')->name('evaluation.createCoevalua')->middleware('auth');
    Route::post('coevaluacion', 'store')->name('evaluation.store');
    Route::get('evaluacion/{user_id}/{date}', 'compare')->name('coder.comparison')->middleware('auth');
});

Route::controller(CoderController::class)->group(function () {
    Route::get('coders', 'index')->name('coders')->middleware('auth');
    Route::get('agregar-coder', 'create')->name('addCoder.create')->middleware('auth');
    Route::post('agregar-coder', 'assignToBootcamp')->name('addCoder.assignToBootcamp');
    Route::get('coder-detail/{id}', 'show')->name('coderDetail.show')->middleware('auth');
    Route::get('historico-evaluacion/{user_id}/{date}', 'compare')->name('trainer.comparisonEvaluation')->middleware('auth');
    Route::get('editar-coder/{id}', 'edit')->name('editCoder.edit')->middleware('auth');
    Route::put('editar-coder/{id}', 'update')->name('editCoder.update');
    Route::delete('eliminar-coder/{id}', 'destroy')->name('deleteCoder.destroy');
});

Route::controller(TrainerController::class)->group(function () {
    Route::get('formadores', 'index')->name('trainers')->middleware('auth');
    Route::delete('eliminar-trainer/{id}', 'destroy')->name('deleteTrainer.destroy');
});

require __DIR__ . '/auth.php';
