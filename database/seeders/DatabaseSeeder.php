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
use App\Models\Servidore;
use App\Models\Group;
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

        $this->call([
            TipoPoderSeeder::class,
            TipoacaoSeeder::class,
            TiporecursoSeeder::class,
            TipoEmpenhoSeeder::class,
            TipoContaSeeder::class,
            TipoContratoSeeder::class,
            CategoriaEmpenhoSeeder::class,
            EntidadeSeeder::class,
            UnidadeSeeder::class,
            NomeorgaoSeeder::class,
            NaturezaReceitumSeeder::class,
            NaturezajuridicaSeeder::class,
            NomecredorSeeder::class,
            FinalidadeSeeder::class,
            FormaingressoSeeder::class,
            FormaJulgamentoSeeder::class,
            ClassificacaoSeeder::class,
            SituacaocargoSeeder::class,
            ClassificacaocargoSeeder::class,
            ClassificacaoAfastamentoSeeder::class,
            VinculoempregaticioSeeder::class,
            LotacaoSeeder::class,
            ModalidadeLicitacaoSeeder::class,
        ]);


     // Criação dos grupos
        $adminGroup = Group::create(['name' => 'Administrador']);
        $financeGroup = Group::create(['name' => 'Financeiro']);
        $secretaryGroup = Group::create(['name' => 'Secretária']);

        // Permissões por grupo
        $adminGroup->permissions()->createMany([
            ['key' => 'view_dashboard'],
            ['key' => 'edit_users'],
            ['key' => 'view_reports'],
            ['key' => 'manage_settings'],
        ]);

        $financeGroup->permissions()->createMany([
            ['key' => 'view_reports'],
            ['key' => 'manage_invoices'],
        ]);

        $secretaryGroup->permissions()->createMany([
            ['key' => 'view_dashboard'],
            ['key' => 'schedule_appointments'],
        ]);

        // Criação dos usuários e vinculação ao grupo

        $adminUser = User::create([
            'name' => 'Usuário Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->groups()->attach($adminGroup);

        $financeUser = User::create([
            'name' => 'Usuário Financeiro',
            'email' => 'financeiro@example.com',
            'password' => bcrypt('password'),
        ]);
        $financeUser->groups()->attach($financeGroup);

        $secretaryUser = User::create([
            'name' => 'Usuário Secretária',
            'email' => 'secretaria@example.com',
            'password' => bcrypt('password'),
        ]);
        $secretaryUser->groups()->attach($secretaryGroup);
    }
}
