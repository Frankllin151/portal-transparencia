<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nomeorgao;
use Illuminate\Support\Str;

class NomeorgaoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Secretaria de Educação'],
            ['id' => Str::uuid(), 'nome' => 'Secretaria de Saúde'],
            ['id' => Str::uuid(), 'nome' => 'Secretaria de Obras'],
        ];
        foreach ($dados as $dado) {
            Nomeorgao::create($dado);
        }
    }
} 