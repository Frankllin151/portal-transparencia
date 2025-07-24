<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassificacaoAfastamento extends Model
{
    public $incrementing = false;
      protected $table  = "classificacao_afastamento";
      protected $fillable = ["id",'nome'];
}
