<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Receitasdespesasextraorcamentarium;
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
             'cpf_cnpj_beneficiario' => $this->faker->cpf(false), // ou cnpj(false) se quiser variar
            'data_pagamento' => $this->faker->date(),
            'historico' => $this->faker->sentence(4),
            'nome_beneficiario' => $this->faker->name(),
            'numero_pagamento' => $this->faker->unique()->numerify('#####'),
            'valor' => $this->faker->randomFloat(2, 100, 10000),
            'receita_depesa_extraorcamentaria_id' => Receitasdespesasextraorcamentarium::factory(),
        ];
    }
}
