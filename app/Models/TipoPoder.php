<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoPoder extends Model
{     public $incrementing = false;
      protected $table  = "tipos_poder";
      protected $fillable = ["id",'nome','ativo'];
      
}
