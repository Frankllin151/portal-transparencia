<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Cargo
 * 
 * @property string $id
 * @property string $ano
 * @property string $competencia
 * @property string $descricao_cargo
 * @property string $classificacao_cargo
 * @property string $situacao_cargo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Servidore[] $servidores
 *
 * @package App\Models
 */
class Cargo extends Model
{
	 use HasFactory;
	protected $table = 'cargos';
	public $incrementing = false;

	protected $fillable = [
		'id',
		'ano',
		'competencia',
		'descricao_cargo',
		'classificacao_cargo',
		'situacao_cargo'
	];

	public function servidores()
	{
		return $this->hasMany(Servidore::class);
	}
}
