<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipoacao;
use Illuminate\Support\Str;

class TipoacaoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Operacional'],
            ['id' => Str::uuid(), 'nome' => 'Estratégica'],
            ['id' => Str::uuid(), 'nome' => 'Tática'],
        ];
        foreach ($dados as $dado) {
            Tipoacao::create($dado);
        }
    }
} 