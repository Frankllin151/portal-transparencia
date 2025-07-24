<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tiporecurso;
use Illuminate\Support\Str;

class TiporecursoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Recursos Próprios'],
            ['id' => Str::uuid(), 'nome' => 'Transferências'],
            ['id' => Str::uuid(), 'nome' => 'Convênios'],
        ];
        foreach ($dados as $dado) {
            Tiporecurso::create($dado);
        }
    }
} 