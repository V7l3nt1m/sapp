<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Aluno;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aluno>
 */
class AlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'n_processo' => shuffle(rand(10000, 15000)),
                'primeiro_nome' => $this->faker->firstName,
                'ultimo_nome' => $this->faker->lastName,
                'nome_completo' => 'primeiro_nome' + $this->faker->firstName + 'ultimo_nome',
                'data_nasc' => $this->faker->dateTimeInInterval($startDate = '-24 years', $endDate = '+18 years'),
                'email' => $this->faker->email,
                'telefone' => shuflle(rand(900000000, 999999999)),
                'curso' => $this->faker->randomElement(['informatica', 'electronica', 'multimedia']),
                'repetente' => 'nao',
        ];
    }
}
