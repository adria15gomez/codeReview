<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;


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
    Route::get('competence', 'index')->name('competence');
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

Route::get('/mi-bootcamp', function () {
    return view('miBootcamp');
});

Route::get('/bootcamps', function () {
    return view('layouts.bootcamps');
});

//Para ver las vistas del Coder "Evaluaciones"
Route::get('/mis-evaluaciones', function () {
    return view('coder.misEvaluaciones');
});

Route::get('/autoevaluacion', function () {
    return view('coder.autoevaluacion');
});

Route::get('/coevaluacion', function () {
    return view('coder.coevaluacion');
});

Route::post('/users/assign-role', [UserController::class, 'assignRole'])->name('users.assign-role');

require __DIR__ . '/auth.php';

Route::get('/resultados-evaluacion', function () {
    return view('coder.resultadosEvaluacion');
});