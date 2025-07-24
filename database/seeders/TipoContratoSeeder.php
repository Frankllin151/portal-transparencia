<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoContrato;
use Illuminate\Support\Str;

class TipoContratoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Serviço'],
            ['id' => Str::uuid(), 'nome' => 'Compra'],
            ['id' => Str::uuid(), 'nome' => 'Locação'],
        ];
        foreach ($dados as $dado) {
            TipoContrato::create($dado);
        }
    }
} 