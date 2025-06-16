<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Processoslicitatorio>
 */
class ProcessoslicitatorioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'entidade' => $this->faker->company(),
            'numero_processo' => $this->faker->numerify('PROC####'),
            'ano_processo' => $this->faker->year(),
            'numero_licitacao' => $this->faker->numerify('LIC###'),
            'ano_licitacao' => $this->faker->year(),
            'modalidade' => $this->faker->randomElement(['Concorrência', 'Tomada de Preços', 'Convite', 'Pregão']),
            'tipo_objeto' => $this->faker->word(),
            'forma_julgamento' => $this->faker->randomElement(['Menor Preço', 'Melhor Técnica', 'Técnica e Preço']),
            'situacao' => $this->faker->randomElement(['Em andamento', 'Concluído', 'Cancelado']),
            'data_homologacao' => $this->faker->date(),
            'cidade_certame' => $this->faker->city(),
            'estado_certame' => $this->faker->stateAbbr(),
            'data_hora_abertura_envelopes' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'inicio_recebimento_envelopes' => $this->faker->dateTimeBetween('-2 years', '-1 year')->format('Y-m-d H:i:s'),
            'termino_recebimento_envelopes' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'data_criacao' => $this->faker->dateTimeBetween('-3 years', '-2 years')->format('Y-m-d H:i:s'),
            'forma_contratacao' => $this->faker->randomElement(['Direta', 'Concorrência', 'Pregão']),
            'registro_precos' => $this->faker->boolean(50),
            'nome_contato' => $this->faker->name(),
        ];
    }
}
