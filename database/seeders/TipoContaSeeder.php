<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoConta;
use Illuminate\Support\Str;

class TipoContaSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Corrente'],
            ['id' => Str::uuid(), 'nome' => 'Poupança'],
            ['id' => Str::uuid(), 'nome' => 'Salário'],
        ];
        foreach ($dados as $dado) {
            TipoConta::create($dado);
        }
    }
} 