<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cargo;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servidore>
 */
class ServidoreFactory extends Factory
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
            'matricula' => $this->faker->unique()->numerify('######'),
            'cargo_id' => Cargo::factory(),
            'nome_servidor' => $this->faker->name(),
            'lotacao' => $this->faker->company(),
            'orgao' => $this->faker->word(),
            'vinculo_empregaticio' => $this->faker->randomElement(['Estatutário', 'CLT', 'Comissionado']),
            'data_admissao' => $this->faker->date(),
            'situacao' => $this->faker->randomElement(['Ativo', 'Afastado', 'Exonerado']),
            'classificacao_cargo' => $this->faker->randomElement(['Efetivo', 'Comissionado', 'Temporário']),
            'classificacao_afastamento' => $this->faker->optional()->randomElement(['Licença médica', 'Licença prêmio', 'Férias']),
            'remuneracao_contratual' => $this->faker->randomFloat(2, 2000, 20000),
            'contribuicao_empregado_rgps' => $this->faker->randomFloat(2, 200, 2000),
            'contribuicao_empregado_rat_fat' => $this->faker->randomFloat(2, 50, 500),
            'contribuicao_patronal_rgps' => $this->faker->randomFloat(2, 500, 3000),
            'efetivo_em_cargo_comissionado' => $this->faker->boolean(),
            'carga_horaria_semanal' => $this->faker->randomElement([20, 30, 40]),
            'carga_horaria_mensal' => fn(array $attributes) => $attributes['carga_horaria_semanal'] * 4,
            'organograma' => $this->faker->word(),
        ];
    }
}
