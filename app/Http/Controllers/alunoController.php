<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\aluno;
use App\Models\curso;
use App\Models\{matricula,turma};
use Illuminate\Support\Facades\DB;

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
        return view('aluno',compact('alunos','turmas','cursos'));
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

       $sql="SELECT matriculas.id, matriculas.anoLetivo,matriculas.data, turmas.classe as classe, turmas.periodo,cursos.nome as curso
       FROM matriculas JOIN cursos on(matriculas.curso=cursos.id) JOIN turmas on(matriculas.turma=turmas.id) JOIN alunos on(matriculas.aluno=alunos.id)
       where matriculas.aluno=$id";

       $fichaMatricula=DB::select($sql);
       dd($fichaMatricula);

       return view('comprovativo', compact('fichaMatricula'));
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
