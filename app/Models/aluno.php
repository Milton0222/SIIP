<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aluno extends Model
{
    use HasFactory;
    protected $fillable=(['nome','genero','pai','mae','idade','foto','naturalidade','telefone','data_nascimento','usuario']);
}
