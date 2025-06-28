<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * Class Servidore
 * 
 * @property string $id
 * @property string $entidade
 * @property string $matricula
 * @property string $cargo_id
 * @property string|null $nome_servidor
 * @property string|null $lotacao
 * @property string|null $orgao
 * @property string|null $vinculo_empregaticio
 * @property Carbon $data_admissao
 * @property string $situacao
 * @property string $classificacao_cargo
 * @property string|null $classificacao_afastamento
 * @property float $remuneracao_contratual
 * @property float|null $contribuicao_empregado_rgps
 * @property float|null $contribuicao_empregado_rat_fat
 * @property float|null $contribuicao_patronal_rgps
 * @property string|null $efetivo_em_cargo_comissionado
 * @property float $carga_horaria_semanal
 * @property float|null $carga_horaria_mensal
 * @property string|null $organograma
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Cargo $cargo
 *
 * @package App\Models
 */
class Servidore extends Model
{
	use HasFactory;
	protected $table = 'servidores';
	public $incrementing = false;

	protected $casts = [
		'data_admissao' => 'datetime',
		'remuneracao_contratual' => 'float',
		'contribuicao_empregado_rgps' => 'float',
		'contribuicao_empregado_rat_fat' => 'float',
		'contribuicao_patronal_rgps' => 'float',
		'carga_horaria_semanal' => 'float',
		'carga_horaria_mensal' => 'float'
	];

	protected $fillable = [
		'id',
		'entidade',
		'matricula',
		'cargo_id',
		'nome_servidor',
		'lotacao',
		'orgao',
		'vinculo_empregaticio',
		'data_admissao',
		'situacao',
		'classificacao_cargo',
		'classificacao_afastamento',
		'remuneracao_contratual',
		'contribuicao_empregado_rgps',
		'contribuicao_empregado_rat_fat',
		'contribuicao_patronal_rgps',
		'efetivo_em_cargo_comissionado',
		'carga_horaria_semanal',
		'carga_horaria_mensal',
		'organograma'
	];

	public function cargo()
	{
		return $this->belongsTo(Cargo::class);
	}
}
