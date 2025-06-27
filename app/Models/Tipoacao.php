<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipoacao extends Model
{
     public $incrementing = false;
      protected $table  = "tipo_acao";
      protected $fillable = ["id",'nome'];
}
