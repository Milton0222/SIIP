<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\disciplina;

class disciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //vizulizar dados

        $disciplinas=disciplina::get();
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
            'tipo'=>$request->tipo
        ]);

        return redirect()->back();
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
        //apagar disciplina

        if($disciplinas=disciplina::findorfail($id)){
            $disciplinas->delete();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
