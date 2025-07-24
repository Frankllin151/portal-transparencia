<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;;
/**
 * Class Movimentacaobancarium
 * 
 * @property string $id
 * @property string $nome_entidade
 * @property string $codigo_conta
 * @property string $codigo_banco
 * @property string $nome_banco
 * @property string $numero_agencia
 * @property string $descricao_agencia
 * @property string $numero_conta
 * @property string $tipo_conta
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Movimentacaobancarium extends Model
{
	use HasFactory;
	protected $table = 'movimentacaobancaria';
	public $incrementing = false;

	protected $fillable = [
		'id',
		'nome_entidade',
		'codigo_conta',
		'codigo_banco',
		'nome_banco',
		'numero_agencia',
		'descricao_agencia',
		'numero_conta',
		'tipo_conta'
	];
}
