<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NaturezaReceitum;
use Illuminate\Support\Str;

class NaturezaReceitumSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            [
                'id' => Str::uuid(),
                'codigo' => '1.1.1.01.01.01.01',
                'descricao' => 'Receita Tributária',
                'categoria_economica' => 'Receita Corrente',
                'origem' => 'Receita Patrimonial',
                'especie' => 'Valores Mobiliários',
                'tipo' => 'Receita Corrente',
                'rubrica' => 'Rubrica Exemplo',
                'alinea' => 'Alinea Exemplo',
                'subalinea' => 'Subalinea Exemplo',
                'desdobramento_nivel_1' => 'Desdobramento 1',
                'desdobramento_nivel_2' => 'Desdobramento 2',
                'desdobramento_nivel_3' => 'Desdobramento 3',
            ],
            [
                'id' => Str::uuid(),
                'codigo' => '1.1.2.01.01.01.01',
                'descricao' => 'Receita de Contribuições',
                'categoria_economica' => 'Receita Corrente',
                'origem' => 'Receita de Contribuições',
                'especie' => 'Espécie Exemplo',
                'tipo' => 'Tipo Exemplo',
                'rubrica' => 'Rubrica Exemplo',
                'alinea' => 'Alinea Exemplo',
                'subalinea' => 'Subalinea Exemplo',
                'desdobramento_nivel_1' => 'Desdobramento 1',
                'desdobramento_nivel_2' => 'Desdobramento 2',
                'desdobramento_nivel_3' => 'Desdobramento 3',
            ],
            [
                'id' => Str::uuid(),
                'codigo' => '2.1.1.01.01.01.01',
                'descricao' => 'Receita de Capital',
                'categoria_economica' => 'Receita de Capital',
                'origem' => 'Receita de Capital',
                'especie' => 'Espécie Exemplo',
                'tipo' => 'Tipo Exemplo',
                'rubrica' => 'Rubrica Exemplo',
                'alinea' => 'Alinea Exemplo',
                'subalinea' => 'Subalinea Exemplo',
                'desdobramento_nivel_1' => 'Desdobramento 1',
                'desdobramento_nivel_2' => 'Desdobramento 2',
                'desdobramento_nivel_3' => 'Desdobramento 3',
            ],
        ];
        foreach ($dados as $dado) {
            NaturezaReceitum::create($dado);
        }
    }
} 