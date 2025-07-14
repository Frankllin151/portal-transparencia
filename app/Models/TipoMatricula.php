<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoMatricula extends Model
{
     public $incrementing = false;
      protected $table  = "tipo_matricula";
      protected $fillable = ["id",'nome'];
}
