<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class falta extends Model
{
    use HasFactory;
    protected $fillable=(['qtdFaltas','data','aluno']);
}
