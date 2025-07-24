<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vinculoempregaticio extends Model
{
    

     public $incrementing = false;
      protected $table  = "vinculo_empregaticio";
      protected $fillable = ["id",'nome'];
}
