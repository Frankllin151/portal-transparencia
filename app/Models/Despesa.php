<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
/**
 * Class Despesa
 * 
 * @property string $id
 * @property int $ano_exercicio
 * @property string $numero_empenho
 * @property string $tipo_empenho
 * @property string $categoria_empenho
 * @property string $historico_empenho
 * @property float|null $valor_empenho
 * @property float|null $valor_liquidado
 * @property float|null $valor_pago
 * @property float|null $valor_orcado
 * @property float|null $valor_atualizado
 * @property float|null $valor_alterado
 * @property float|null $porcentagem_empenhado_sobre_orcado
 * @property float|null $porcentagem_liquidado_sobre_orcado
 * @property float|null $porcentagem_pago_sobre_orcado
 * @property Carbon|null $data_empenho
 * @property Carbon|null $data_liquidacao
 * @property Carbon|null $data_pagamento
 * @property string $finalidade_programa
 * @property string $objetivo_programa
 * @property string $tipo_acao_programa
 * @property string $entidade
 * @property string $orgao
 * @property string $codigo_orgao
 * @property string $unidade
 * @property string $codigo_unidade
 * @property string $credor_nome
 * @property string $credor_cnpj_cpf
 * @property string $credor_natureza_juridica
 * @property string $codigo_funcao
 * @property string $descricao_funcao
 * @property string $codigo_subfuncao
 * @property string $descricao_subfuncao
 * @property string $codigo_programa
 * @property string $descricao_programa
 * @property string $codigo_acao
 * @property string $descricao_acao
 * @property string $codigo_elemento
 * @property string $descricao_elemento
 * @property string $mascara_natureza
 * @property string $natureza_despesa
 * @property string $codigo_recurso
 * @property string $descricao_recurso
 * @property string $tipo_recurso
 * @property string $modalidade_aplicacao
 * @property string $tipo_poder
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Despesa extends Model
{
	use HasFactory;
	protected $table = 'despesa';
	public $incrementing = false;
    protected $keyType = 'string';
	protected $casts = [
		'ano_exercicio' => 'int',
		'valor_empenho' => 'float',
		'valor_liquidado' => 'float',
		'valor_pago' => 'float',
		'valor_orcado' => 'float',
		'valor_atualizado' => 'float',
		'valor_alterado' => 'float',
		'porcentagem_empenhado_sobre_orcado' => 'float',
		'porcentagem_liquidado_sobre_orcado' => 'float',
		'porcentagem_pago_sobre_orcado' => 'float',
		'data_empenho' => 'datetime',
		'data_liquidacao' => 'datetime',
		'data_pagamento' => 'datetime'
	];

	protected $fillable = [
		'id',
		'ano_exercicio',
		'numero_empenho',
		'tipo_empenho',
		'categoria_empenho',
		'historico_empenho',
		'valor_empenho',
		'valor_liquidado',
		'valor_pago',
		'valor_orcado',
		'valor_atualizado',
		'valor_alterado',
		'porcentagem_empenhado_sobre_orcado',
		'porcentagem_liquidado_sobre_orcado',
		'porcentagem_pago_sobre_orcado',
		'data_empenho',
		'data_liquidacao',
		'data_pagamento',
		'finalidade_programa',
		'objetivo_programa',
		'tipo_acao_programa',
		'entidade',
		'orgao',
		'codigo_orgao',
		'unidade',
		'codigo_unidade',
		'credor_nome',
		'credor_cnpj_cpf',
		'credor_natureza_juridica',
		'codigo_funcao',
		'descricao_funcao',
		'codigo_subfuncao',
		'descricao_subfuncao',
		'codigo_programa',
		'descricao_programa',
		'codigo_acao',
		'descricao_acao',
		'codigo_elemento',
		'descricao_elemento',
		'mascara_natureza',
		'natureza_despesa',
		'codigo_recurso',
		'descricao_recurso',
		'tipo_recurso',
		'modalidade_aplicacao',
		'tipo_poder'
	];
}
