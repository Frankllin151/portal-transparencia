<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoConta extends Model
{
     public $incrementing = false;
      protected $table  = "tipo_conta";
      protected $fillable = ["id",'nome'];
}
