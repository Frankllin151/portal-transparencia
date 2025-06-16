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
 * Class NaturezaReceitum
 * 
 * @property string $id
 * @property string $codigo
 * @property string $descricao
 * @property string $categoria_economica
 * @property string $origem
 * @property string $especie
 * @property string $tipo
 * @property string $rubrica
 * @property string $alinea
 * @property string $subalinea
 * @property string $desdobramento_nivel_1
 * @property string $desdobramento_nivel_2
 * @property string $desdobramento_nivel_3
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Receitum[] $receita
 *
 * @package App\Models
 */
class NaturezaReceitum extends Model
{
	use HasFactory;
	protected $table = 'natureza_receita';
	public $incrementing = false;

	protected $fillable = [
		'codigo',
		'descricao',
		'categoria_economica',
		'origem',
		'especie',
		'tipo',
		'rubrica',
		'alinea',
		'subalinea',
		'desdobramento_nivel_1',
		'desdobramento_nivel_2',
		'desdobramento_nivel_3'
	];

	public function receita()
	{
		return $this->hasMany(Receitum::class, 'natureza_id');
	}
}
