<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    // Define o nome da tabela pivô
    protected $table = 'group_user';

    // Define que as chaves primárias não são incrementais (já que é user_id e group_id)
    public $incrementing = false;

     public $timestamps = false;

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'user_id',
        'group_id',
    ];

    // Se as chaves primárias não forem inteiras, você precisa definir seus tipos
    protected $casts = [
        'user_id' => 'string', // Assumindo que user_id pode ser UUID ou string
        'group_id' => 'string', // group_id é UUID, então é string
    ];

    // Opcional: Definir relacionamentos se necessário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
