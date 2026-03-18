<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\Collaborator;
use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    public function run(): void
    {
        $colaboradores = Collaborator::all();

        foreach ($colaboradores as $colaborador) {
            Contract::factory()->count(2)->create([
                'collaborator_id' => $colaborador->id
            ]);
        }
    }
}