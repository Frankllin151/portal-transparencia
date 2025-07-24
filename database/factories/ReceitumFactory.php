<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\NaturezaReceitum;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receitum>
 */
class ReceitumFactory extends Factory
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
    'data' => $this->faker->date(),
    'natureza_id' => NaturezaReceitum::factory(), // ok se quiser criar a relação
    'finalidade' => $this->faker->sentence(3),
    'forma_ingresso' => $this->faker->randomElement(['Arrecadação Direta', 'Transferência', 'Outros']),
    'valor_orcado_inicial' => $this->faker->randomFloat(2, 1000, 500000),
    'valor_orcado_atualizado' => $this->faker->randomFloat(2, 1000, 600000),
    'valor_deducoes_orcado' => $this->faker->randomFloat(2, 0, 10000),
    'valor_arrecadado_mes' => $this->faker->randomFloat(2, 0, 50000),
    'valor_arrecadado_acumulado' => $this->faker->randomFloat(2, 0, 200000),
    'valor_deducoes_mes' => $this->faker->randomFloat(2, 0, 5000),
    'valor_lancado_mes' => $this->faker->randomFloat(2, 0, 30000),
    'valor_lancado_periodo' => $this->faker->randomFloat(2, 0, 150000),
    'receita_corrente_liquida' => $this->faker->boolean(), // CORRIGIDO
    'realizado_percentual' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
