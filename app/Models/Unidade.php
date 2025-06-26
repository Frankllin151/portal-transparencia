<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
     public $incrementing = false;
      protected $table  = "unidade";
      protected $fillable = ["id",'nome'];
}
