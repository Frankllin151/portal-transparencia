<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nomecredor;
use Illuminate\Support\Str;

class NomecredorSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'João da Silva'],
            ['id' => Str::uuid(), 'nome' => 'Empresa XYZ Ltda'],
            ['id' => Str::uuid(), 'nome' => 'Maria Oliveira'],
        ];
        foreach ($dados as $dado) {
            Nomecredor::create($dado);
        }
    }
} 