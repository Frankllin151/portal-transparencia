<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;
    public $incrementing = false;
     protected $fillable = [ "id",'group_id', 'key'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
