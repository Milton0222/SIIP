<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publi extends Model
{
    use HasFactory;

    protected $table="posts";
    protected $fillable=['titulo','contente'];
}
