<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrato>
 */
class ContratoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $dataInicial = $this->faker->dateTimeBetween('-2 years', 'now');
        $dataFinal = $this->faker->dateTimeBetween($dataInicial, $dataInicial->format('Y-m-d').' +1 year');
        return [
             'entidade' => $this->faker->company(),
            'data_assinatura' => $this->faker->date(),
            'numero_contrato' => $this->faker->numerify('CTR#####'),
            'numero_processo' => $this->faker->numerify('PROC####'),
            'ano' => $this->faker->year(),
            'modalidade_licitacao' => $this->faker->randomElement(['Concorrência', 'Tomada de Preços', 'Pregão', 'Convite']),
            'tipo_contrato' => $this->faker->randomElement(['Serviço', 'Compra', 'Locação']),
            'contratado' => $this->faker->company(),
            'data_vigencia_inicial' => $dataInicial->format('Y-m-d'),
            'data_vigencia_final' => $dataFinal->format('Y-m-d'),
            'situacao' => $this->faker->randomElement(['Ativo', 'Encerrado', 'Cancelado']),
            'valor_inicial' => $this->faker->randomFloat(2, 10000, 1000000),
            'valor_final' => $this->faker->randomFloat(2, 10000, 1000000),
            'competencia' => $this->faker->monthName(),
            'instrumento_contrato' => $this->faker->word(),
            'codigo_fornecedor' => $this->faker->numerify('FORN###'),
            'codigo_processo' => $this->faker->numerify('PROC###'),
            'numero_licitacao' => $this->faker->numerify('LIC###'),
            'subcontratacao' => $this->faker->boolean(20),
        ];
    }
}
