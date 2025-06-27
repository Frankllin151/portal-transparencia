<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
     public $incrementing = false;
      protected $table  = "classificacao";
      protected $fillable = ["id",'nome'];
}
