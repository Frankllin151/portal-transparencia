<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModalidadeLicitacao extends Model
{
  
     public $incrementing = false;
      protected $table  = "modalidade_licitacao";
      protected $fillable = ["id",'nome'];
}
