<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * Class ContratosItem
 * 
 * @property string $id
 * @property int $codigo_item_contrato
 * @property string $descricao_item_contrato
 * @property string $unidade_medida
 * @property int $quantidade
 * @property float $valor_unitario
 * @property float $valor_total
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $contrato_id
 * 
 * @property Contrato|null $contrato
 *
 * @package App\Models
 */
class ContratosItem extends Model
{
	use HasFactory;
	protected $table = 'contratos_item';
	public $incrementing = false;

	protected $casts = [
		'codigo_item_contrato' => 'int',
		'quantidade' => 'int',
		'valor_unitario' => 'float',
		'valor_total' => 'float'
	];

	protected $fillable = [
		'id',
		'codigo_item_contrato',
		'descricao_item_contrato',
		'unidade_medida',
		'quantidade',
		'valor_unitario',
		'valor_total',
		'contrato_id'
	];

	public function contrato()
	{
		return $this->belongsTo(Contrato::class);
	}
}
