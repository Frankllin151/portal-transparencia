<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classificacaocargo extends Model
{
      public $incrementing = false;
      protected $table  = "classificacao_cargo";
      protected $fillable = ["id",'nome'];
}
