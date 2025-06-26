<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaEmpenho extends Model
{
     public $incrementing = false;
      protected $table  = "categoria_empenho";
      protected $fillable = ["id",'nome'];
}
