<?php

namespace Database\Seeders;

use App\Models\User;
use  App\Models\Cargo;
use App\Models\Contrato;
use App\Models\ContratosItem;
use App\Models\Despesa;
use App\Models\Movimentacaobancarium;
use App\Models\NaturezaReceitum;
use App\Models\Pagamentosreceitasdespesasextraorcamentarium;
use App\Models\Processoslicitatorio;
use App\Models\Receitasdespesasextraorcamentarium;
use App\Models\Receitum;
use App\Models\Servidore;;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Despesa::factory()->count(10)->create();
        Processoslicitatorio::factory()->count(10)->create();
        Contrato::factory()->count(10)->hascontratos_items(3)->create();
        Movimentacaobancarium::factory()->count(10)->create();
        NaturezaReceitum::factory()
    ->count(10)
    ->has(Receitum::factory()->count(3), 'receita')
    ->create();
        Cargo::factory()->count(10)->hasservidores(3)->create();
        Receitasdespesasextraorcamentarium::factory()->count(10)->create();
        Pagamentosreceitasdespesasextraorcamentarium::factory()->count(3)->create();


       
    }
}
