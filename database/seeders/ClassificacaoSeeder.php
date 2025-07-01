<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classificacao;
use Illuminate\Support\Str;

class ClassificacaoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Receita'],
            ['id' => Str::uuid(), 'nome' => 'Despesa'],
            ['id' => Str::uuid(), 'nome' => 'Investimento'],
        ];
        foreach ($dados as $dado) {
            Classificacao::create($dado);
        }
    }
} 