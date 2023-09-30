<?php

use App\Http\Controllers\alunoController;
use App\Http\Controllers\disciplinaController;
use App\Http\Controllers\funcionariosController;
use App\Http\Controllers\turmaController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Post;

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
})->name('/');
Route::get('/post', Post::class);

Route::get('/alunos/show',[alunoController::class, 'index'])->name('aluno.index')->middleware('auth');
Route::get('/turma/show',[turmaController::class, 'index'])->name('turma.index');
Route::get('/disciplina/show',[disciplinaController::class, 'index'])->name('disciplina.index');
Route::get('/funcionario/shhow', [funcionariosController::class ,'index'])->name('funcionario.index')->middleware(['auth']);
Route::post('/funcionario/Salvar',[funcionariosController::class ,'store'])->name('funcionario.store');
Route::get('/funcionario/Iliminar{id}',[funcionariosController::class ,'destroy'])->name('funcionario.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
