<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaJulgamento extends Model
{
    
     public $incrementing = false;
      protected $table  = "forma_julgamento";
      protected $fillable = ["id",'nome'];
}
