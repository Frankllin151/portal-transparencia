<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fonterecurso extends Model
{
      public $incrementing = false;
      protected $table  = "fonte_recurso";
      protected $fillable = ["id",'nome'];
}
