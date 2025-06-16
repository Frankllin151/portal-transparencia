<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NaturezaReceitum>
 */
class NaturezaReceitumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->numerify('1.1.1.##.##.##.##'), // formato simulado de código
            'descricao' => $this->faker->sentence(3),
            'categoria_economica' => $this->faker->randomElement(['Receita Corrente', 'Receita de Capital']),
            'origem' => $this->faker->word(),
            'especie' => $this->faker->word(),
            'tipo' => $this->faker->word(),
            'rubrica' => $this->faker->word(),
            'alinea' => $this->faker->word(),
            'subalinea' => $this->faker->word(),
            'desdobramento_nivel_1' => $this->faker->word(),
            'desdobramento_nivel_2' => $this->faker->word(),
            'desdobramento_nivel_3' => $this->faker->word(),
        ];
    }
}
