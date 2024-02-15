<?php

namespace App\Http\Controllers;

use App\Models\turma;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class turmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //vizualizar
        $turmas=turma::get();

        Alert::toast('Carregando dados','Sucesso');
        return view('turma',compact('turmas'));
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
        //inserir turma

        turma::create($request
        ->all());
        Alert::success('Criar Turma','sucesso');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //


        $sql="SELECT *FROM turmas
        WHERE classe LIKE '%$request->search%';";


            $turmas=DB::select($sql);
            if($turmas)
        Alert::toast('Carregando dados','Sucesso');
      else
        Alert::error('Procurando Turmas','não encontrado');
        return view('turma',compact('turmas'));
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
        if($turmas=turma::findorfail($id)){
            $turmas->update($request->all());
            return redirect()->back();}
            else
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //apagando turma
        if($turmas=turma::findorfail($id)){
            $turmas->delete();

            Alert::success('Apagando Turma','sucesso');
            return redirect()->back();
        }else{
            Alert::eror('Apagando Turma','Erro');
            return redirect()->back();
        }
    }
}
