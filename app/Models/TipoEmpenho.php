<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEmpenho extends Model
{
     public $incrementing = false;
      protected $table  = "tipos_empenho";
      protected $fillable = ["id",'nome'];
}
