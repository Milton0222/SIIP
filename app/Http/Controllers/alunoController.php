<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aluno;
use App\Models\curso;
use App\Models\{matricula,turma,falta};
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Dompdf\Adapter\PDFLib;

class alunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ver alunos na view

        $alunos=aluno::get();
        $turmas=turma::get();
        $cursos=curso::get();
        Alert::toast('Carregando dados','Sucesso');
        return view('aluno',compact('alunos','turmas','cursos'));
    }
    public function falta(Request $request){
        falta::create($request->all());

        $sql="SELECT alunos.id, alunos.nome,alunos.genero, faltas.qtdFaltas,faltas.data
        FROM alunos JOIN faltas on(alunos.id=faltas.aluno)";
            $faltas=DB::select($sql);
        return view('falta',compact('faltas'));
    }
    public function listarF(){
        $sql="SELECT alunos.id, alunos.nome,alunos.genero, faltas.qtdFaltas,faltas.data
        FROM alunos JOIN faltas on(alunos.id=faltas.aluno)";
            $faltas=DB::select($sql);
        Alert::toast('Carregaando dados','sucesso.');
        return view('falta',compact('faltas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function matricular(Request $request, string $id)
    {
        //confirmar matricula
        if($alunos=aluno::findorfail($id)){
           matricula::create($request->all());
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
    public function imprimirConfirmacao(string $id){

       $sql="SELECT matriculas.id, alunos.nome as aluno, matriculas.anoLetivo,matriculas.data, turmas.classe as classe, turmas.periodo,cursos.nome as curso
       FROM matriculas JOIN cursos on(matriculas.curso=cursos.id) JOIN turmas on(matriculas.turma=turmas.id) JOIN alunos on(matriculas.aluno=alunos.id)
       where matriculas.aluno=$id";

       $fichaMatricula=DB::select($sql);
       
            Alert::success('Processando Ficha','sucesso');
       return \PDF::loadview('comprovativo',compact('fichaMatricula'))->setPaper('a4')->stream();
    }
    public function consultarPauta(Request $request){

        $sql="SELECT alunos.id,alunos.nome,disciplinas.nome as 'disciplina', pautas.valor, pautas.classificacao
        FROM alunos JOIN pautas on(alunos.id=pautas.aluno) JOIN disciplinas on(disciplinas.id=pautas.disciplina)
        WHERE alunos.telefone=$request->contacto or alunos.id=$request->matricula";

        if($pautas=DB::select($sql)){
            Alert::success('Procurando Dados','sucesso');
            return view('consulta', compact('pautas'));
        }else{
            Alert::error('Procurando Dados','dados não enccontrado');
            return view('consulta', compact('pautas'));
        }
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //metodo inserir aluno
       
        if($request->foto !=null){

            $extensao=$request->foto->extension();
            $nomeFoto=strtotime('now').".".$extensao;
            $request->foto->move(public_path('assets/arquivos'),$nomeFoto);

            aluno::create([
                'nome'=>$request->nome,
                'pai'=>$request->pai,
                'mae'=>$request->mae,
                'data_nascimento'=>$request->data_nascimento,
                'telefone'=>$request->telefone,
                'provincia'=>$request->provincia,
                'municipio'=>$request->municipio,
                'usuario'=>$request->usuario,
                'genero'=>$request->genero,
                'foto'=>$nomeFoto,
                'idade'=>$request->idade,
                'naturalidade'=>$request->naturalidade
            ]);
            return redirect()->back();

        }else{
            return redirect()->back();
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //metodo apagar

       if($alunos=aluno::findorfail($id)){
        unlink('assets/arquivos/'.$alunos->foto);
          $alunos->delete();
        return redirect()->back();
       }else{
        return redirect()->back();
       }
        
    }
}
