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
        $sql1="SELECT alunos.id, alunos.nome FROM alunos JOIN matriculas on(alunos.id=matriculas.aluno)";
        $alunos=aluno::get();
        $alunosM=DB::select($sql1);
        $turmas=turma::get();
        $cursos=curso::get();
        Alert::toast('Carregando dados','Sucesso');
        //dd($alunosM);
        return view('aluno',compact('alunos','turmas','cursos','alunosM'));
    }
    public function consultar(Request $request){

        
        $sql1="SELECT alunos.id, alunos.nome FROM alunos JOIN matriculas on(alunos.id=matriculas.aluno)
        where alunos.identidade='$request->search' or alunos.id=$request->search";

        $sql11="SELECT *FROM alunos
        where alunos.identidade='$request->search' or alunos.id=$request->search";
        $alunos=DB::select($sql11);
        $alunosM=DB::select($sql1);
        $turmas=turma::get();
        $cursos=curso::get();

        if($alunos)
        Alert::toast('Carregando dados','Sucesso');
        //dd($alunosM);
        else{
            Alert::error('Procurando Aluno','Dados não encontrado');
        }
        return view('aluno',compact('alunos','turmas','cursos','alunosM'));


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
        Alert::toast('Carregando dados','sucesso.');
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
            return redirect()->route('confirmado.index');
        }else{
            return redirect()->back();
        }
    }
    public function imprimirConfirmacao(string $id){

       $sql="SELECT matriculas.id, alunos.nome as aluno, matriculas.anoLetivo,matriculas.data, turmas.classe as classe, turmas.periodo,cursos.nome as curso
       FROM matriculas JOIN cursos on(matriculas.curso=cursos.id) JOIN turmas on(matriculas.turma=turmas.id) JOIN alunos on(matriculas.aluno=alunos.id)
       where matriculas.aluno=$id";

       $fichaMatricula=DB::select($sql);
       $inscrito=aluno::where('id',$id)->get();
       
            Alert::success('Processando Ficha','sucesso');
            
       return view('comprovativo',compact('fichaMatricula','inscrito'));
    }
    public function consultarPauta(Request $request){

        $sql="SELECT alunos.id,alunos.nome,disciplinas.nome as 'disciplina', pautas.valor, pautas.classificacao
        FROM alunos JOIN pautas on(alunos.id=pautas.aluno) JOIN disciplinas on(disciplinas.id=pautas.disciplina)
        WHERE alunos.id=$request->matricula";
        $pautas=DB::select($sql);

        if($pautas){
            Alert::success('Procurando Dados','sucesso');
            return view('consulta', compact('pautas'));
        }else{
            Alert::error('Procurando Dados','dados não enccontrado');
            return redirect()->route("/");
        }
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //metodo inserir aluno
         
        $dataActual=date('y');
      
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
                'morada'=>$request->morada,
                'usuario'=>$request->usuario,
                'genero'=>$request->genero,
                'foto'=>$nomeFoto,
                'idade'=>$request->idade,
                'naturalidade'=>$request->naturalidade,
                'identidade'=>$request->identidade,
                'lingua'=>$request->lingua,
                'nacionalidade'=>$request->nacionalidade
            ]);
            Alert::success('Inscrevendo aluno','sucesso');
            return redirect()->back();

        }else{
            Alert::errror('Inscrevendo aluno','erro!');
            return redirect()->back();
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function historicoAluno(string $id)
    {
        //
      $sql="SELECT disciplinas.nome,pautas.valor, pautas.classificacao
      FROM pautas JOIN disciplinas on(pautas.disciplina=disciplinas.id) JOIN alunos on(pautas.aluno=alunos.id)
      WHERE alunos.id=$id";

      $sql1="SELECT year(matriculas.created_at) as 'ano',cursos.nome as 'curso',turmas.periodo,matriculas.id 
      FROM alunos JOIN matriculas on(matriculas.aluno=alunos.id) JOIN turmas on(turmas.id=matriculas.turma) JOIN cursos on(cursos.id=matriculas.curso)
      WHERE alunos.id=$id";

      $inscrito=DB::select($sql);
      $dadosAcademico=DB::select($sql1);
      $aluno=aluno::where("id",$id)->get();

      return view('historico',compact('inscrito','aluno','dadosAcademico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function consultarDados(Request $request)
    {
        //

        $sql="SELECT alunos.nome,alunos.identidade,alunos.foto,alunos.genero,alunos.id as 'matricula',alunos.telefone,
		turmas.classe,turmas.periodo,cursos.nome as 'curso'
            FROM
            alunos JOIN matriculas on(alunos.id=matriculas.aluno) JOIN cursos on(cursos.id=matriculas.curso)
            JOIN turmas on(matriculas.turma=turmas.id)
            WHERE  alunos.identidade='$request->identidade';";

            $estudante=DB::select($sql);
            if($estudante){ 
                Alert::success('Buscando Estudante','Encontrados');

        return view('alunoDetalhes',compact('estudante'));
     }else{
        Alert::error('Buscando Estudante','Não Encontrados');

        return redirect()->back();

     }
    }
public function requisitarD(Request $request){

    dd($request->all());
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if($alunos=aluno::findorfail($id)){
            $alunos->update($request->all());
            return redirect()->back();
        }else{
            return redirect()->back();
        }
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
          Alert::success('Apagando aluno','sucesso');
        return redirect()->back();
       }else{
        Alert::success('Apagando aluno','Erro');
        return redirect()->back();
       }
        
    }
}
