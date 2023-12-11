<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\teachersController;
use App\Http\Controllers\disciplinesController;
use App\Http\Controllers\activitiesController;
use App\Http\Controllers\activities_responsesController;

Route::get('/logout/students', [studentsController::class, 'logout'])->name('logout.students');
Route::get('/login/students', [studentsController::class, 'login'])->name('login.students');
Route::post('/logar/students', [studentsController::class, 'logar'])->name('logar.students');
Route::get('/create/teacher', [teachersController::class, 'create'])->name('create.teachers');
Route::post('/store/teacher', [teachersController::class, 'store'])->name('store.teachers');
Route::get('/login/teacher', [teachersController::class, 'login'])->name('login.teachers');
Route::post('/logar/teacher', [teachersController::class, 'logar'])->name('logar.teachers');

Route::middleware(['aluno'])->group(function () {
    Route::get('/aluno/atividade', [studentsController::class, 'atividade'])->name('aluno.atividade');
    Route::get('/aluno/lista/{id}', [studentsController::class, 'lista'])->name('aluno.lista');
    Route::get('/aluno/respondida/{id}', [studentsController::class, 'respondida'])->name('aluno.respondida');
    Route::get('/aluno/responde/{id}', [activities_responsesController::class, 'create'])->name('aluno.responde');
    Route::post('/aluno/enviado/{id}', [activities_responsesController::class, 'store'])->name('aluno.enviado');
    Route::get('/aluno/edit/{id}', [activities_responsesController::class, 'editRes'])->name('aluno.edit');
    Route::put('/atividade/update/{id}', [activities_responsesController::class, 'updateRes'])->name('aluno.update');
    Route::get('/aluno/dados/{id}', [studentsController::class, 'dados'])->name('aluno.dados');
    Route::get('/editar/{id}', [studentsController::class, 'editarAluno'])->name('editarAluno');
    Route::put('/update/dados/{id}', [studentsController::class, 'updateAluno'])->name('updateAluno');
});

Route::middleware(['professor'])->group(function () {
    Route::get('/aluno/editar/{id}', [studentsController::class, 'editar'])->name('edit.aluno');
    Route::put('/aluno/update/{id}', [studentsController::class, 'update'])->name('update.aluno');
    Route::get('/create/students', [studentsController::class, 'create'])->name('create.students');
    Route::post('/store/students', [studentsController::class, 'store'])->name('store.students');
    Route::get('/logout/teacher', [teachersController::class, 'logout'])->name('logout.teachers');
    Route::get('/listagem/aluno', [teachersController::class, 'listagem'])->name('listagem.alunos');
    Route::get('/create/disciplines', [disciplinesController::class, 'create'])->name('create.disciplines');
    Route::post('/store/disciplines', [disciplinesController::class, 'store'])->name('store.disciplines');
    Route::get('/index/disciplines', [disciplinesController::class, 'index'])->name('index');
    Route::get('/create/activities/{id}', [activitiesController::class, 'create'])->name('create.activities');
    Route::post('/store/activities/{id}', [activitiesController::class, 'store'])->name('store.activities');
    Route::get('/atividade/activities/{id}', [activitiesController::class, 'ativi'])->name('ativi.atividade');
    Route::get('/lista/activities/{id}', [activities_responsesController::class, 'lista'])->name('lista.activities');
    Route::get('/nota/edit/{id}', [activities_responsesController::class, 'editNota'])->name('edit.nota');
    Route::put('/nota/update/{id}', [activities_responsesController::class, 'update'])->name('update.nota');
});
