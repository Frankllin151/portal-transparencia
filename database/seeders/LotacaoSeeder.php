<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lotacao;
use Illuminate\Support\Str;

class LotacaoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Secretaria de Administração'],
            ['id' => Str::uuid(), 'nome' => 'Secretaria de Educação'],
            ['id' => Str::uuid(), 'nome' => 'Secretaria de Saúde'],
        ];
        foreach ($dados as $dado) {
            Lotacao::create($dado);
        }
    }
} 