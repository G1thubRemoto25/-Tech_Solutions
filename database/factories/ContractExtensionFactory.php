<?php

namespace Database\Factories;

use App\Models\ContractExtension;
use App\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractExtensionFactory extends Factory
{
    protected $model = ContractExtension::class;

    public function definition(): array
    {
        $extensionType = $this->faker->randomElement(['Tiempo', 'Valor']);
        
        return [
            'contract_id' => Contract::factory(),
            'extension_type' => $extensionType,
            'new_end_date' => $extensionType === 'Tiempo' ? $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d') : null,
            'additional_value' => $extensionType === 'Valor' ? $this->faker->randomFloat(2, 100000, 2000000) : null,
            'description' => $this->faker->sentence(),
        ];
    }
}