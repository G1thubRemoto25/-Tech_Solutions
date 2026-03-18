<?php

namespace Database\Factories;

use App\Models\Contract;
use App\Models\Collaborator;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    protected $model = Contract::class;

    public function definition(): array
    {
        return [
            'collaborator_id' => Collaborator::factory(),
            'contract_type' => $this->faker->randomElement(['Fijo', 'Indefinido', 'Prestación de Servicios']),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'position' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomFloat(2, 1000000, 5000000),
            'status' => 'Activo',
        ];
    }
}