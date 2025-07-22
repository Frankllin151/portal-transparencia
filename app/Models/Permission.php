<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
     protected $fillable = ['group_id', 'key'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
