<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
     public $incrementing = false;
      protected $table  = "tipo_contrato";
      protected $fillable = ["id",'nome'];
}
