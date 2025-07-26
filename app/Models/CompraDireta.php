<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
class CompraDireta extends Model
{
    use HasFactory;

    // Define o nome da tabela associada ao modelo
    protected $table = 'comprasdiretas';

    // Define que a chave primária não é um inteiro auto-incrementável
    public $incrementing = false;

    // Define o tipo da chave primária como string (para UUID)
    protected $keyType = 'string';

    // Define a chave primária
    protected $primaryKey = 'id';

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo',
        'centro_de_custos',
        'data_da_compra',
        'objeto',
        'fornecedor',
        'cnpj_cpf_fornecedor',
        'fundamentacao',
        'tipo',
        'valor_rs',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data_da_compra' => 'date',
        'valor_rs' => 'decimal:2', // Converte para decimal com 2 casas decimais
    ];

    /**
     * Sobrescreve o método "boot" para gerar um UUID antes de criar um novo registro.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Se o ID não estiver definido, gera um novo UUID
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
