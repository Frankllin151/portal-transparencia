<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Finalidade;
use Illuminate\Support\Str;

class FinalidadeSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Educação'],
            ['id' => Str::uuid(), 'nome' => 'Saúde'],
            ['id' => Str::uuid(), 'nome' => 'Infraestrutura'],
        ];
        foreach ($dados as $dado) {
            Finalidade::create($dado);
        }
    }
} 