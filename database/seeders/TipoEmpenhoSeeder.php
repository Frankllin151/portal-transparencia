<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoEmpenho;
use Illuminate\Support\Str;

class TipoEmpenhoSeeder extends Seeder
{
    public function run(): void
    {
        $dados = [
            ['id' => Str::uuid(), 'nome' => 'Ordinário'],
            ['id' => Str::uuid(), 'nome' => 'Extraordinário'],
            ['id' => Str::uuid(), 'nome' => 'Global'],
        ];
        foreach ($dados as $dado) {
            TipoEmpenho::create($dado);
        }
    }
} 