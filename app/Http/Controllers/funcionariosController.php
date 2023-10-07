<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PhpParser\Builder\Use_;

class funcionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //pegar funcionarios
        $funcionarios=User::where('nivel',2)->get();
        Alert::toast('Carregando dados','Sucesso');
        return view('funcionarios', compact('funcionarios'));
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
        //
        if($request->caso==0){
            User::create(['name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'nivel'=>$request->nivel])->givePermissionTo('RSA');
        } if($request->caso==1){
            User::create(['name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'nivel'=>$request->nivel])->givePermissionTo('FSA');
        }if($request->caso==2){
            User::create(['name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'nivel'=>$request->nivel])->givePermissionTo('professor');
        }
       
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
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if($funcionario=User::findorfail($id)){
            $funcionario->delete();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
