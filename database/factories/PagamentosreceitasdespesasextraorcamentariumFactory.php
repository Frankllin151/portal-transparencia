<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Receitasdespesasextraorcamentarium;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pagamentosreceitasdespesasextraorcamentarium>
 */
class PagamentosreceitasdespesasextraorcamentariumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
              'id' => Str::uuid(),
             'cpf_cnpj_beneficiario' => $this->faker->numerify('###.###.###-##'),
            'historico' => $this->faker->sentence(4),
             'data_pagamento' => $this->faker->date(),
            'nome_beneficiario' => $this->faker->name(),
            'numero_pagamento' => $this->faker->unique()->numerify('#####'),
            'valor' => $this->faker->randomFloat(2, 100, 10000),
            'receita_depesa_extraorcamentaria_id' => Receitasdespesasextraorcamentarium::factory(),
        ];
    }
}
