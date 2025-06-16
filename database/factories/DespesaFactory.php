<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Despesa>
 */
class DespesaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
         'ano_exercicio' => $this->faker->year(),
            'numero_empenho' => $this->faker->numerify('EMP####'),
            'tipo_empenho' => $this->faker->randomElement(['Ordinário', 'Extraordinário']),
            'categoria_empenho' => $this->faker->word(),
            'historico_empenho' => $this->faker->sentence(6),
            'valor_empenho' => $this->faker->randomFloat(2, 1000, 100000),
            'valor_liquidado' => $this->faker->randomFloat(2, 500, 90000),
            'valor_pago' => $this->faker->randomFloat(2, 500, 80000),
            'valor_orcado' => $this->faker->randomFloat(2, 1000, 120000),
            'valor_atualizado' => $this->faker->randomFloat(2, 1000, 130000),
            'valor_alterado' => $this->faker->randomFloat(2, 0, 20000),
            'porcentagem_empenhado_sobre_orcado' => $this->faker->randomFloat(2, 0, 1),
            'porcentagem_liquidado_sobre_orcado' => $this->faker->randomFloat(2, 0, 1),
            'porcentagem_pago_sobre_orcado' => $this->faker->randomFloat(2, 0, 1),
            'data_empenho' => $this->faker->date(),
            'data_liquidacao' => $this->faker->date(),
            'data_pagamento' => $this->faker->date(),
            'finalidade_programa' => $this->faker->sentence(4),
            'objetivo_programa' => $this->faker->sentence(4),
            'tipo_acao_programa' => $this->faker->word(),
            'entidade' => $this->faker->company(),
            'orgao' => $this->faker->word(),
            'codigo_orgao' => $this->faker->numerify('ORG###'),
            'unidade' => $this->faker->word(),
            'codigo_unidade' => $this->faker->numerify('UNI###'),
            'credor_nome' => $this->faker->name(),
            'credor_cnpj_cpf' => $this->faker->regexify('(\d{3}\.\d{3}\.\d{3}-\d{2}|\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2})'), // CPF ou CNPJ formato
            'credor_natureza_juridica' => $this->faker->word(),
            'codigo_funcao' => $this->faker->numerify('FNC###'),
            'descricao_funcao' => $this->faker->sentence(3),
            'codigo_subfuncao' => $this->faker->numerify('SFC###'),
            'descricao_subfuncao' => $this->faker->sentence(3),
            'codigo_programa' => $this->faker->numerify('PRG###'),
            'descricao_programa' => $this->faker->sentence(3),
            'codigo_acao' => $this->faker->numerify('ACO###'),
            'descricao_acao' => $this->faker->sentence(3),
            'codigo_elemento' => $this->faker->numerify('ELM###'),
            'descricao_elemento' => $this->faker->sentence(3),
            'mascara_natureza' => $this->faker->numerify('###.###.###'),
            'natureza_despesa' => $this->faker->word(),
            'codigo_recurso' => $this->faker->numerify('REC###'),
            'descricao_recurso' => $this->faker->sentence(3),
            'tipo_recurso' => $this->faker->word(),
            'modalidade_aplicacao' => $this->faker->word(),
            'tipo_poder' => $this->faker->randomElement(['Executivo', 'Legislativo', 'Judiciário']),
        ];
    }
}
