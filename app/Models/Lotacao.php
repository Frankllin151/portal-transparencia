<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lotacao extends Model
{
     public $incrementing = false;
      protected $table  = "lotacao";
      protected $fillable = ["id",'nome'];
}
