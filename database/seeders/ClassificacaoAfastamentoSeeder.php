<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassificacaoAfastamento;
use Illuminate\Support\Str;

class ClassificacaoAfastamentoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Licença médica'],
            ['id' => Str::uuid(), 'nome' => 'Licença prêmio'],
            ['id' => Str::uuid(), 'nome' => 'Férias'],
        ];
        foreach ($dados as $dado) {
            ClassificacaoAfastamento::create($dado);
        }
    }
} 