<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * Class Processoslicitatorio
 * 
 * @property string $id
 * @property string $entidade
 * @property int $numero_processo
 * @property int $ano_processo
 * @property int $numero_licitacao
 * @property int $ano_licitacao
 * @property string $modalidade
 * @property string $tipo_objeto
 * @property string $forma_julgamento
 * @property string $situacao
 * @property Carbon $data_homologacao
 * @property string $cidade_certame
 * @property string $estado_certame
 * @property Carbon $data_hora_abertura_envelopes
 * @property Carbon $inicio_recebimento_envelopes
 * @property Carbon $termino_recebimento_envelopes
 * @property Carbon $data_criacao
 * @property string $forma_contratacao
 * @property string $registro_precos
 * @property string $nome_contato
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Processoslicitatorio extends Model
{
	 use HasFactory;

	protected $table = 'processoslicitatorios';
	public $incrementing = false;

	protected $casts = [
		'numero_processo' => 'int',
		'ano_processo' => 'int',
		'numero_licitacao' => 'int',
		'ano_licitacao' => 'int',
		'data_homologacao' => 'datetime',
		'data_hora_abertura_envelopes' => 'datetime',
		'inicio_recebimento_envelopes' => 'datetime',
		'termino_recebimento_envelopes' => 'datetime',
		'data_criacao' => 'datetime'
	];

	protected $fillable = [
		'id',
		'entidade',
		'numero_processo',
		'ano_processo',
		'numero_licitacao',
		'ano_licitacao',
		'modalidade',
		'tipo_objeto',
		'forma_julgamento',
		'situacao',
		'data_homologacao',
		'cidade_certame',
		'estado_certame',
		'data_hora_abertura_envelopes',
		'inicio_recebimento_envelopes',
		'termino_recebimento_envelopes',
		'data_criacao',
		'forma_contratacao',
		'registro_precos',
		'nome_contato'
	];
}
