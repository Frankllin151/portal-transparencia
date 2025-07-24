<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unidade;
use Illuminate\Support\Str;

class UnidadeSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Unidade Central'],
            ['id' => Str::uuid(), 'nome' => 'Unidade Regional'],
            ['id' => Str::uuid(), 'nome' => 'Unidade Escolar'],
        ];
        foreach ($dados as $dado) {
            Unidade::create($dado);
        }
    }
} 