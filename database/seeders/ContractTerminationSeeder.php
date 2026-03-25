<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\ContractTermination;
use Illuminate\Database\Seeder;

class ContractTerminationSeeder extends Seeder
{
    public function run(): void
    {
        $contratos = Contract::where('status', 'Terminado')->get();

        foreach ($contratos as $contrato) {
            ContractTermination::factory()->create([
                'contract_id' => $contrato->id
            ]);
        }
    }
}