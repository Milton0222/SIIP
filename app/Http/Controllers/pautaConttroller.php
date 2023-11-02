<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{pauta,aluno,disciplina,turma};
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
      FROM  alunos JOIN pautas on(pautas.aluno=alunos.id) JOIN disciplinas on(pautas.disciplina=disciplinas.id) JOIN turmas on(pautas.turma=turmas.id)";  

        $pautas=DB::select($sql);
        $alunos=aluno::get();
        $turmas=turma::get();
        $disciplinas=disciplina::get();
        Alert::toast('Carregando dados','Sucesso');
        return view('pauta',compact('pautas','disciplinas','alunos','turmas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
