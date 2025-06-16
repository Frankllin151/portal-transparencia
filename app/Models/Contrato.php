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
 * Class Contrato
 * 
 * @property string $id
 * @property string $entidade
 * @property Carbon $data_assinatura
 * @property string $numero_contrato
 * @property int $numero_processo
 * @property int $ano
 * @property string $modalidade_licitacao
 * @property string $tipo_contrato
 * @property string $contratado
 * @property Carbon $data_vigencia_inicial
 * @property Carbon $data_vigencia_final
 * @property string $situacao
 * @property float $valor_inicial
 * @property float $valor_final
 * @property string $competencia
 * @property string $instrumento_contrato
 * @property string $codigo_fornecedor
 * @property string $codigo_processo
 * @property int $numero_licitacao
 * @property string $subcontratacao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ContratosItem[] $contratos_items
 *
 * @package App\Models
 */
class Contrato extends Model
{
	use HasFactory;
	protected $table = 'contratos';
	public $incrementing = false;

	protected $casts = [
		'data_assinatura' => 'datetime',
		'numero_processo' => 'int',
		'ano' => 'int',
		'data_vigencia_inicial' => 'datetime',
		'data_vigencia_final' => 'datetime',
		'valor_inicial' => 'float',
		'valor_final' => 'float',
		'numero_licitacao' => 'int'
	];

	protected $fillable = [
		'entidade',
		'data_assinatura',
		'numero_contrato',
		'numero_processo',
		'ano',
		'modalidade_licitacao',
		'tipo_contrato',
		'contratado',
		'data_vigencia_inicial',
		'data_vigencia_final',
		'situacao',
		'valor_inicial',
		'valor_final',
		'competencia',
		'instrumento_contrato',
		'codigo_fornecedor',
		'codigo_processo',
		'numero_licitacao',
		'subcontratacao'
	];

	public function contratos_items()
	{
		return $this->hasMany(ContratosItem::class);
	}
}
