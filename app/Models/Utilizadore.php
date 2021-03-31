<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilizadore extends Model
{
    // nao faz registo de timestamps na base de dados
    public $timestamps = false;
    use HasFactory;
}
