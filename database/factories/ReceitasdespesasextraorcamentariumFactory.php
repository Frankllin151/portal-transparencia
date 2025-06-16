<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receitasdespesasextraorcamentarium>
 */
class ReceitasdespesasextraorcamentariumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'classificacao' => $this->faker->randomElement(['Receita Extra', 'Despesa Extra']),
            'descricao_classificacao' => $this->faker->sentence(3),
            'fonte_recursos' => $this->faker->randomElement(['Tesouro', 'Convênios', 'Doações', 'Outros']),
            'mascara' => $this->faker->numerify('9.9.9.99.99'),
            'numero' => $this->faker->unique()->numberBetween(1, 99999),
        ];
    }
}
