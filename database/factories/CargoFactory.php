<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cargo>
 */
class CargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ano' => $this->faker->year(),
            'competencia' => $this->faker->monthName(),
            'descricao_cargo' => $this->faker->jobTitle(),
            'classificacao_cargo' => $this->faker->randomElement(['Efetivo', 'Comissionado', 'Temporário']),
            'situacao_cargo' => $this->faker->randomElement(['Ativo', 'Inativo', 'Extinto']),
        ];
    }
}
