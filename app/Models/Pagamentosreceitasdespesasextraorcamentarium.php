<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * Class Pagamentosreceitasdespesasextraorcamentarium
 * 
 * @property string $id
 * @property string $cpf_cnpj_beneficiario
 * @property string $data_pagamento
 * @property string $historico
 * @property string $nome_beneficiario
 * @property string $numero_pagamento
 * @property string $valor
 * @property int $receita_depesa_extraorcamentaria_id
 *
 * @package App\Models
 */
class Pagamentosreceitasdespesasextraorcamentarium extends Model
{
	use HasFactory;
	protected $table = 'pagamentosreceitasdespesasextraorcamentaria';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'receita_depesa_extraorcamentaria_id' => 'string'
	];

	protected $fillable = [
		'cpf_cnpj_beneficiario',
		'data_pagamento',
		'historico',
		'nome_beneficiario',
		'numero_pagamento',
		'valor',
		'receita_depesa_extraorcamentaria_id'
	];
}
