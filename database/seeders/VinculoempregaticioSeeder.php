<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vinculoempregaticio;
use Illuminate\Support\Str;

class VinculoempregaticioSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Estatutário'],
            ['id' => Str::uuid(), 'nome' => 'CLT'],
            ['id' => Str::uuid(), 'nome' => 'Comissionado'],
        ];
        foreach ($dados as $dado) {
            Vinculoempregaticio::create($dado);
        }
    }
} 