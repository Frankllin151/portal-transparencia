<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movimentacaobancarium>
 */
class MovimentacaobancariumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bancos = [
            ['codigo' => '001', 'nome' => 'Banco do Brasil S.A.'],
            ['codigo' => '104', 'nome' => 'Caixa Econômica Federal'],
            ['codigo' => '237', 'nome' => 'Banco Bradesco S.A.'],
            ['codigo' => '341', 'nome' => 'Banco Itaú S.A.'],
            ['codigo' => '033', 'nome' => 'Banco Santander S.A.'],
            ['codigo' => '745', 'nome' => 'Banco Citibank S.A.'],
            ['codigo' => '399', 'nome' => 'Banco HSBC S.A.'],
            ['codigo' => '655', 'nome' => 'Banco Votorantim S.A.'],
            ['codigo' => '041', 'nome' => 'Banco do Estado do Rio Grande do Sul S.A.'],
            ['codigo' => '070', 'nome' => 'Banco de Brasília S.A.'],
        ];
        $banco = $this->faker->randomElement($bancos);
        
        $tiposConta = ['corrente', 'poupanca', 'salario', 'investimento'];
        return [
            'nome_entidade' => $this->faker->company(),
            'codigo_conta' => $this->faker->numerify('######'),
            'codigo_banco' => $banco['codigo'],
            'nome_banco' => $banco['nome'],
            'numero_agencia' => $this->faker->numerify('####'),
            'descricao_agencia' => 'Agência ' . $this->faker->city(),
            'numero_conta' => $this->faker->numerify('########-#'),
            'tipo_conta' => $this->faker->randomElement($tiposConta),
        ];
    }
}
