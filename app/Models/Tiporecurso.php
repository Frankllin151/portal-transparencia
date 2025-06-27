<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiporecurso extends Model
{
     public $incrementing = false;
      protected $table  = "tipo_recurso";
      protected $fillable = ["id",'nome'];
}
