<?php

use App\Http\Controllers\alunoController;
use App\Http\Controllers\disciplinaController;
use App\Http\Controllers\funcionariosController;
use App\Http\Controllers\pautaConttroller;
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
    return view('dashboard');
})->name('/')->middleware(['auth']);
Route::get('/post', Post::class);

Route::get('/alunos/show',[alunoController::class, 'index'])->name('aluno.index')->middleware('auth');
Route::post('/aluno/store',[alunoController::class , 'store'])->name('aluno.store');
Route::get('/aluno/apagar{id}',[alunoController::class , 'destroy'])->name('aluno.destroy');
Route::post('/aluno/matricula{id}',[alunoController::class, 'matricular'])->name('matricula.store');
Route::get('/aluno/imprimir{id}',[alunoController::class, 'imprimirConfirmacao'])->name('matricula.imprimir');
Route::post('/aluno/falta',[alunoController::class, 'falta'])->name('falta.store');
Route::get('/aluno/falta/show',[alunoController::class, 'listarF'])->name('falta.listar');
Route::get('/aluno/pauta/show',[alunoController::class, 'consultarPauta'])->name('consultar.pauta');
Route::get('/aluno/actualizar/{id}',[alunoController::class, 'update'])->name('aluno.update');
Route::get('/aluno/historico/{id}',[alunoController::class,'historicoAluno'])->name('aluno.historico');

Route::get('/pauta/show',[pautaConttroller::class, 'index'])->name('pauta.index');
Route::post('/pauta/store',[pautaConttroller::class, 'store'])->name('pauta.store');
Route::get('/pauta/destroy{id}',[pautaConttroller::class,'destroy'])->name('pauta.destroy');
Route::get('/elaborar/pauta/{id}',[pautaConttroller::class, 'elaborarPauta'])->name('pauta.elaborar');
Route::get('/buscar/pauta',[pautaConttroller::class,'showPautaCurso'])->name('pauta.search');

Route::get('/turma/show',[turmaController::class, 'index'])->name('turma.index');
Route::post('/turma/store',[turmaController::class, 'store'])->name('turma.store');
Route::get('/turma/apagar{id}',[turmaController::class,'destroy'])->name('turma.destroy');
Route::get('/turma/actualizar{id}',[turmaController::class,'update'])->name('turma.update');

Route::get('/disciplina/show',[disciplinaController::class, 'index'])->name('disciplina.index');
Route::post('/disciplina/store',[disciplinaController::class, 'store'])->name('disciplina.store');
Route::get('/disciplina/apagar{id}', [disciplinaController::class, 'destroy'])->name('disciplina.destroy');
Route::get('/disciplina/actualizar{id}', [disciplinaController::class, 'update'])->name('disciplina.update');

Route::get('/funcionario/shhow', [funcionariosController::class ,'index'])->name('funcionario.index')->middleware(['auth']);
Route::post('/funcionario/Salvar',[funcionariosController::class ,'store'])->name('funcionario.store');
Route::get('/funcionario/Iliminar{id}',[funcionariosController::class ,'destroy'])->name('funcionario.destroy');
Route::get('/funcionario/actualizar{id}',[funcionariosController::class ,'update'])->name('funcionario.update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
