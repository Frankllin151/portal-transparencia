<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finalidade extends Model
{
    public $incrementing = false;
      protected $table  = "finalidade";
      protected $fillable = ["id",'nome'];
}
