<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contrato;
use Illuminate\Support\Str;
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
    $valorTotal = round($quantidade * $valorUnitario, 2); // garante 2 casas decimais

    return [
        'id' => Str::uuid(),
        'codigo_item_contrato' => $this->faker->numberBetween(1000, 99999), // agora é inteiro
        'descricao_item_contrato' => $this->faker->sentence(3),
        'unidade_medida' => $this->faker->randomElement(['unidade', 'litro', 'metro', 'caixa']),
        'quantidade' => $quantidade,
        'valor_unitario' => $valorUnitario,
        'valor_total' => $valorTotal,
        'contrato_id' => Contrato::factory(), // OK: cria contrato automaticamente
    ];
    }
}
