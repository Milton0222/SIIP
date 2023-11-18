<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{pauta,aluno, curso, disciplina,turma};
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class pautaConttroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //vizualizando pauta

      $sql="SELECT alunos.id, pautas.aluno as 'code',alunos.nome as aluno, alunos.genero,disciplinas.nome as disciplina, disciplinas.tipo,turmas.nome as turma,turmas.classe, turmas.periodo,pautas.valor,pautas.classificacao
      FROM  alunos JOIN pautas on(pautas.aluno=alunos.id) JOIN disciplinas on(pautas.disciplina=disciplinas.id) JOIN turmas on(pautas.turma=turmas.id)
      where alunos.id=0";  

    $sql1="SELECT *FROM alunos JOIN matriculas on(alunos.id=matriculas.aluno)";
        $pautas=DB::select($sql);
        $alunos=DB::select($sql1);
        $turmas=turma::get();
        $disciplinas=disciplina::get();
        
        $cursos=curso::get();

        Alert::toast('Carregando dados','Sucesso');
        return view('pauta',compact('pautas','disciplinas','alunos','turmas','cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function elaborarPauta(string $id)
    {
        //
        $sql="SELECT alunos.id,alunos.nome,alunos.genero,alunos.idade,alunos.naturalidade,alunos.provincia,matriculas.turma,turmas.nome as 'nturma',turmas.classe,turmas.periodo
        FROM alunos JOIN matriculas on(alunos.id=matriculas.aluno) JOIN cursos on(cursos.id=matriculas.curso) JOIN turmas on(matriculas.turma=turmas.id)
        WHERE cursos.id=$id";
        $alunoCurso=DB::select($sql);

     
        $turmas=turma::get();
        $disciplinas=disciplina::get();
        
        $cursoU=curso::where('id',$id)->first();

        return view('alunoCurso',compact('alunoCurso','turmas','disciplinas','cursoU'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //elaborar pauta

        if($request->valor >=10){

            pauta::create([
                'valor'=>$request->valor,
                'classificacao'=>'Aprovado',
                'disciplina'=>$request->disciplina,
                'aluno'=>$request->aluno,
                'turma'=>$request->turma
            ]);
            Alert::success('Elaborar Pauta','sucesso');
            return redirect()->back();
        }else{
            pauta::create([
                'valor'=>$request->valor,
                'classificacao'=>'Reprovado',
                'disciplina'=>$request->disciplina,
                'aluno'=>$request->aluno,
                'turma'=>$request->turma
            ]);
            Alert::success('Elaborar Pauta','sucesso');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function showPautaCurso(Request $request)
    {
        //
        $sql="SELECT pautas.aluno as 'code',alunos.nome as 'aluno',alunos.id, alunos.genero, disciplinas.nome as 'disciplina', pautas.valor, pautas.classificacao,turmas.nome as 'turma',matriculas.anoLetivo, cursos.nome as 'curso',turmas.periodo,turmas.classe

        FROM alunos JOIN pautas on(alunos.id=pautas.aluno) JOIN disciplinas on(disciplinas.id=pautas.disciplina) JOIN matriculas on(matriculas.aluno=alunos.id) JOIN cursos on(matriculas.curso=cursos.id) JOIN turmas on(turmas.id=matriculas.turma)
        
        WHERE cursos.id=$request->curso and disciplinas.id=$request->disciplina";

        $pautas=DB::select($sql);
        $disciplinas=disciplina::get();
        $turmas=turma::get();
        $cursos=curso::get();
        $alunos=aluno::get();



        Alert::toast('Carregando dados','Sucesso');
return view('pauta',compact('pautas','disciplinas','alunos','turmas','cursos'));


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
        //iliminar pauta de um ddeterminado aluno e disciplina
              
        if($pautas=pauta::find($id)){
            $pautas->delete();
            Alert::success('Apagando Pauta','sucesso');
            return redirect()->back();
        }else{
            Alert::error('Apagando Pauta','Erro');
            return redirect()->back();
        }
    }
}
