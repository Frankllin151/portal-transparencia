<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Situacaocargo;
use Illuminate\Support\Str;

class SituacaocargoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Ativo'],
            ['id' => Str::uuid(), 'nome' => 'Inativo'],
            ['id' => Str::uuid(), 'nome' => 'Afastado'],
        ];
        foreach ($dados as $dado) {
            Situacaocargo::create($dado);
        }
    }
} 