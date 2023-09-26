<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\publi;

class Post extends Component
{

    public $titulo="Contador";
    public  $contar;
    public $todos=[];
    public $todo='';
    public $tituloo;
    public $contente;


    public function salvar(){
        publi::create([
            'titulo'=>$this->tituloo,
            'contente'=>$this->contente
        ]);
    }

    public function listar(){
        $this->todos[]=$this->todo;
        $this->todo='';
    }
    public function add(){
          $this->contar++;

    }
    public function sub(){
        $this->contar--;
    }
    public function  iliminar($id){
        $apagar=publi::find($id);
        $apagar->delete();
    }
    public function actualizar($id){

        $actua=publi::findorfail($id);
        $actua->update([
            'titulo'=>$this->tituloo,'contente'=>$this->contente]);
    }

    public function render()
    {
        return view('livewire.post', ['livro'=>publi::all()]);
    }
}
