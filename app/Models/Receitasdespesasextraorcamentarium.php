<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * Class Receitasdespesasextraorcamentarium
 * 
 * @property string $id
 * @property string $classificacao
 * @property string $descricao_classificacao
 * @property string $fonte_recursos
 * @property string $mascara
 * @property string $numero
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Receitasdespesasextraorcamentarium extends Model
{
	use HasFactory;
	protected $table = 'receitasdespesasextraorcamentaria';
	public $incrementing = false;

	protected $fillable = [
		'id',
		'classificacao',
		'descricao_classificacao',
		'fonte_recursos',
		'mascara',
		'numero'
	];
}
