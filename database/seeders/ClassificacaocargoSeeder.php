<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classificacaocargo;
use Illuminate\Support\Str;

class ClassificacaocargoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Efetivo'],
            ['id' => Str::uuid(), 'nome' => 'Comissionado'],
            ['id' => Str::uuid(), 'nome' => 'Temporário'],
        ];
        foreach ($dados as $dado) {
            Classificacaocargo::create($dado);
        }
    }
} 