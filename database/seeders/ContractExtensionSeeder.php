<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\ContractExtension;
use Illuminate\Database\Seeder;

class ContractExtensionSeeder extends Seeder
{
    public function run(): void
    {
        $contratos = Contract::whereIn('contract_type', ['Fijo', 'Prestación de Servicios'])
                              ->where('status', 'Activo')
                              ->get();

        foreach ($contratos as $contrato) {
            // 30% de probabilidad de tener prórrogas
            if (rand(1, 100) <= 30) {
                ContractExtension::factory()->count(rand(1, 2))->create([
                    'contract_id' => $contrato->id
                ]);
            }
        }
    }
}