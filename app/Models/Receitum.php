<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * Class Receitum
 * 
 * @property string $id
 * @property Carbon $data
 * @property string $natureza_id
 * @property string $finalidade
 * @property string $forma_ingresso
 * @property float|null $valor_orcado_inicial
 * @property float|null $valor_orcado_atualizado
 * @property float|null $valor_deducoes_orcado
 * @property float|null $valor_arrecadado_mes
 * @property float|null $valor_arrecadado_acumulado
 * @property float|null $valor_deducoes_mes
 * @property float|null $valor_lancado_mes
 * @property float|null $valor_lancado_periodo
 * @property bool $receita_corrente_liquida
 * @property float|null $realizado_percentual
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property NaturezaReceitum $natureza_receitum
 *
 * @package App\Models
 */
class Receitum extends Model
{
	use HasFactory;
	protected $table = 'receita';
	public $incrementing = false;

	protected $casts = [
		'data' => 'datetime',
		'valor_orcado_inicial' => 'float',
		'valor_orcado_atualizado' => 'float',
		'valor_deducoes_orcado' => 'float',
		'valor_arrecadado_mes' => 'float',
		'valor_arrecadado_acumulado' => 'float',
		'valor_deducoes_mes' => 'float',
		'valor_lancado_mes' => 'float',
		'valor_lancado_periodo' => 'float',
		'receita_corrente_liquida' => 'bool',
		'realizado_percentual' => 'float'
	];

	protected $fillable = [
		'data',
		'natureza_id',
		'finalidade',
		'forma_ingresso',
		'valor_orcado_inicial',
		'valor_orcado_atualizado',
		'valor_deducoes_orcado',
		'valor_arrecadado_mes',
		'valor_arrecadado_acumulado',
		'valor_deducoes_mes',
		'valor_lancado_mes',
		'valor_lancado_periodo',
		'receita_corrente_liquida',
		'realizado_percentual'
	];

	public function naturezaReceitum()
	{
		return $this->belongsTo(NaturezaReceitum::class, 'natureza_id');
	}
}
