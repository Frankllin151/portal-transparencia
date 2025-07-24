<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
            'id' => Str::uuid(),
    'entidade' => $this->faker->company(),
    'numero_processo' => $this->faker->numberBetween(1000, 9999),
    'ano_processo' => $this->faker->year(),
    'numero_licitacao' => $this->faker->numberBetween(100, 9999), // corrigido para inteiro
    'ano_licitacao' => $this->faker->year(),
    'modalidade' => $this->faker->randomElement(['Concorrência', 'Tomada de Preços', 'Convite', 'Pregão']),
    'tipo_objeto' => $this->faker->words(3, true),
    'forma_julgamento' => $this->faker->randomElement(['Menor Preço', 'Melhor Técnica', 'Técnica e Preço']),
    'situacao' => $this->faker->randomElement(['Em andamento', 'Concluído', 'Cancelado']),
    'data_homologacao' => $this->faker->date(),
    'cidade_certame' => $this->faker->city(),
    'estado_certame' => $this->faker->stateAbbr(),
    'data_hora_abertura_envelopes' => $this->faker->dateTimeBetween('-1 year', 'now'),
    'inicio_recebimento_envelopes' => $this->faker->dateTimeBetween('-2 years', '-1 year'),
    'termino_recebimento_envelopes' => $this->faker->dateTimeBetween('-1 year', 'now'),
    'data_criacao' => $this->faker->date(),
    'forma_contratacao' => $this->faker->randomElement(['Direta', 'Concorrência', 'Pregão']),
    'registro_precos' => $this->faker->randomElement(['Sim', 'Não']), // string ao invés de boolean
    'nome_contato' => $this->faker->name(),
        ];
    }
}
