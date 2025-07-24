<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
      public $incrementing = false;
     protected $fillable = ["id", 'name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
