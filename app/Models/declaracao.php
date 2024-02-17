<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class declaracao extends Model
{
    use HasFactory;
    protected $fillable=(['tipo','com nota','frequência','aluno','anoFrequencia','pagamento','aluno' ]);
}
