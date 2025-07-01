<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formaingresso;
use Illuminate\Support\Str;

class FormaingressoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Concurso Público'],
            ['id' => Str::uuid(), 'nome' => 'Processo Seletivo'],
            ['id' => Str::uuid(), 'nome' => 'Indicação'],
        ];
        foreach ($dados as $dado) {
            Formaingresso::create($dado);
        }
    }
} 