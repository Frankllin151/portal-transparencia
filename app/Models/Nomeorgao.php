<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomeorgao extends Model
{
     public $incrementing = false;
      protected $table  = "nome_orgao";
      protected $fillable = ["id",'nome'];
}
