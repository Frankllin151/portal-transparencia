<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formaingresso extends Model
{
    public $incrementing = false;
      protected $table  = "forma_ingresso";
      protected $fillable = ["id",'nome'];
}
