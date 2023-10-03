<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pauta extends Model
{
    use HasFactory;
    protected $fillable=(['valor','classificacao','aluno','disciplina','turma']);
}
