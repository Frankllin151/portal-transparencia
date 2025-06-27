<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Naturezajuridica extends Model
{
     public $incrementing = false;
      protected $table  = "natureza_juridica";
      protected $fillable = ["id",'nome'];
}
