<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModalidadeLicitacao;
use Illuminate\Support\Str;

class ModalidadeLicitacaoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Concorrência'],
            ['id' => Str::uuid(), 'nome' => 'Tomada de Preços'],
            ['id' => Str::uuid(), 'nome' => 'Convite'],
        ];
        foreach ($dados as $dado) {
            ModalidadeLicitacao::create($dado);
        }
    }
} 