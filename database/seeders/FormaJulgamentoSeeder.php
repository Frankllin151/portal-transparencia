<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormaJulgamento;
use Illuminate\Support\Str;

class FormaJulgamentoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Menor Preço'],
            ['id' => Str::uuid(), 'nome' => 'Melhor Técnica'],
            ['id' => Str::uuid(), 'nome' => 'Técnica e Preço'],
        ];
        foreach ($dados as $dado) {
            FormaJulgamento::create($dado);
        }
    }
} 