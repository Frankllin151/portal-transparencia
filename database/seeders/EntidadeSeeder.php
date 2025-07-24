<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entidade;
use Illuminate\Support\Str;

class EntidadeSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Prefeitura Municipal'],
            ['id' => Str::uuid(), 'nome' => 'Câmara Municipal'],
            ['id' => Str::uuid(), 'nome' => 'Secretaria de Saúde'],
        ];
        foreach ($dados as $dado) {
            Entidade::create($dado);
        }
    }
} 