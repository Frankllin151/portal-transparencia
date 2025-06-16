<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contrato;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContratosItem>
 */
class ContratosItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
          $quantidade = $this->faker->numberBetween(1, 100);
        $valorUnitario = $this->faker->randomFloat(2, 10, 500);
        return [
        'codigo_item_contrato' => $this->faker->unique()->numerify('ITEM###'),
            'descricao_item_contrato' => $this->faker->sentence(3),
            'unidade_medida' => $this->faker->randomElement(['unidade', 'litro', 'metro', 'caixa']),
            'quantidade' => $quantidade,
            'valor_unitario' => $valorUnitario,
            'valor_total' => $quantidade * $valorUnitario,
            'contrato_id' => Contrato::factory(),
        ];
    }
}
