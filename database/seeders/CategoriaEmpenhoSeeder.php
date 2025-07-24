<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriaEmpenho;
use Illuminate\Support\Str;

class CategoriaEmpenhoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Material de Consumo'],
            ['id' => Str::uuid(), 'nome' => 'Serviços de Terceiros'],
            ['id' => Str::uuid(), 'nome' => 'Obras e Instalações'],
        ];
        foreach ($dados as $dado) {
            CategoriaEmpenho::create($dado);
        }
    }
} 