<?php

use App\Http\Controllers\alunoController;
use App\Http\Controllers\confirmadosController;
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
Route::post('/aluno/store',[alunoController::class , 'store'])->name('aluno.store')->middleware('auth');
Route::get('/aluno/apagar{id}',[alunoController::class , 'destroy'])->name('aluno.destroy')->middleware('auth');
Route::post('/aluno/matricula{id}',[alunoController::class, 'matricular'])->name('matricula.store')->middleware('auth');
Route::get('/aluno/imprimir{id}',[alunoController::class, 'imprimirConfirmacao'])->name('matricula.imprimir')->middleware('auth');
Route::post('/aluno/falta',[alunoController::class, 'falta'])->name('falta.store')->middleware('auth');
Route::get('/aluno/falta/show',[alunoController::class, 'listarF'])->name('falta.listar')->middleware('auth');
Route::get('/aluno/pauta/show',[alunoController::class, 'consultarPauta'])->name('consultar.pauta')->middleware('auth');
Route::get('/aluno/actualizar/{id}',[alunoController::class, 'update'])->name('aluno.update')->middleware('auth');
Route::get('/aluno/historico/{id}',[alunoController::class,'historicoAluno'])->name('aluno.historico')->middleware('auth');
Route::get('/aluno/consultar',[alunoController::class,'consultar'])->name('consultar.aluno');

Route::get('/pauta/show',[pautaConttroller::class, 'index'])->name('pauta.index')->middleware('auth');
Route::post('/pauta/store',[pautaConttroller::class, 'store'])->name('pauta.store')->middleware('auth');
Route::get('/pauta/destroy{id}',[pautaConttroller::class,'destroy'])->name('pauta.destroy')->middleware('auth');
Route::get('/elaborar/pauta/{id}',[pautaConttroller::class, 'elaborarPauta'])->name('pauta.elaborar');
Route::get('/buscar/pauta',[pautaConttroller::class,'showPautaCurso'])->name('pauta.search')->middleware('auth');

Route::get('/turma/show',[turmaController::class, 'index'])->name('turma.index')->middleware('auth');
Route::post('/turma/store',[turmaController::class, 'store'])->name('turma.store')->middleware('auth');
Route::get('/turma/apagar{id}',[turmaController::class,'destroy'])->name('turma.destroy')->middleware('auth');
Route::get('/turma/actualizar{id}',[turmaController::class,'update'])->name('turma.update')->middleware('auth');
Route::get('/turma/consultar',[turmaController::class,'show'])->name('consulta.turma')->middleware('auth');

Route::get('/disciplina/show',[disciplinaController::class, 'index'])->name('disciplina.index')->middleware('auth');
Route::post('/disciplina/store',[disciplinaController::class, 'store'])->name('disciplina.store')->middleware('auth');
Route::get('/disciplina/apagar{id}', [disciplinaController::class, 'destroy'])->name('disciplina.destroy')->middleware('auth');
Route::get('/disciplina/actualizar{id}', [disciplinaController::class, 'update'])->name('disciplina.update')->middleware('auth');
Route::get('/disciplina/consultar', [disciplinaController::class, 'show'])->name('consulta.disciplina')->middleware('auth');

Route::get('/funcionario/shhow', [funcionariosController::class ,'index'])->name('funcionario.index')->middleware(['auth']);
Route::post('/funcionario/Salvar',[funcionariosController::class ,'store'])->name('funcionario.store')->middleware('auth');
Route::get('/funcionario/Iliminar{id}',[funcionariosController::class ,'destroy'])->name('funcionario.destroy')->middleware('auth');
Route::get('/funcionario/actualizar{id}',[funcionariosController::class ,'update'])->name('funcionario.update')->middleware('auth');
Route::get('/funcionario/consultar',[funcionariosController::class ,'consultar'])->name('consultar.funcionario')->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/Confirmados/ver',[confirmadosController::class, 'index'])->name('confirmado.index')->middleware('auth');
Route::post('Estudante/buscar',[alunoController::class,'consultarDados'])->name('estudante.dados')->middleware('auth');
Route::post('Declaracao/requisitar',[alunoController::class,'requisitarD'])->name('estudante.requisitar')->middleware('auth');