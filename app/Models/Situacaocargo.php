<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Situacaocargo extends Model
{
     public $incrementing = false;
      protected $table  = "situacao_cargo";
      protected $fillable = ["id",'nome'];
}
