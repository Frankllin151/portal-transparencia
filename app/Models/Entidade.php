<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
     public $incrementing = false;
      protected $table  = "entidade";
      protected $fillable = ["id",'nome'];
}
