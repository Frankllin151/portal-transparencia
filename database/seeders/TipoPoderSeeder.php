<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoPoder;
use Illuminate\Support\Str;

class TipoPoderSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Executivo'],
            ['id' => Str::uuid(), 'nome' => 'Legislativo'],
            ['id' => Str::uuid(), 'nome' => 'Judiciário'],
        ];
        foreach ($dados as $dado) {
            TipoPoder::create($dado);
        }
    }
} 