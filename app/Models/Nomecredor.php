<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nomecredor extends Model
{
     public $incrementing = false;
      protected $table  = "nome_credor";
      protected $fillable = ["id",'nome'];
}
