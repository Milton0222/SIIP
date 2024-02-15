<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\disciplina;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class disciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //vizulizar dados

        $disciplinas=disciplina::get();
        Alert::toast('Carregando dados','Sucesso');
        return view('disciplina', compact('disciplinas'));
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
        //salvar  disciplina
    

        disciplina::create([
            'nome'=>$request->nome,
            'tipo'=>$request->tipo,
            'classe'=>$request->classe
        ]);
        Alert::success('Registar Disciplina','sucesso');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
                $sql="SELECT *FROM disciplinas
                WHERE id=$request->search;";


                    $disciplinas=DB::select($sql);
                    if($disciplinas)
                Alert::toast('Carregando dados','Sucesso');
              else
                Alert::error('Procurando disciplina','não encontrado');
                return view('disciplina', compact('disciplinas'));
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

        if($disciplinas=disciplina::findorfail($id)){
            $disciplinas->update($request->all());
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
        //apagar disciplina

        if($disciplinas=disciplina::findorfail($id)){
            $disciplinas->delete();
            Alert::success('Apagando Disciplina','sucesso');
            return redirect()->back();
        }else{
            Alert::error('Apagando Disciplina','Erro');
            return redirect()->back();
        }
    }
}
