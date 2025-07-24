<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Naturezajuridica;
use Illuminate\Support\Str;

class NaturezajuridicaSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Pessoa Física'],
            ['id' => Str::uuid(), 'nome' => 'Pessoa Jurídica'],
            ['id' => Str::uuid(), 'nome' => 'Empresa Pública'],
        ];
        foreach ($dados as $dado) {
            Naturezajuridica::create($dado);
        }
    }
} 