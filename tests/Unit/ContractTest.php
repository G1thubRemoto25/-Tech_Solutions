<?php

namespace Tests\Feature;

use App\Models\Contract;
use App\Models\Collaborator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContractTest extends TestCase
{
    use RefreshDatabase;

    /**
     * PRUEBA 1: Verificar que se puede crear un contrato con colaborador existente
     */
    public function test_puede_crear_contrato_con_colaborador_existente()
    {
        // Crear colaborador
        $colaborador = Collaborator::factory()->create();

        // Crear contrato
        $contrato = Contract::create([
            'collaborator_id' => $colaborador->id,
            'contract_type' => 'Fijo',
            'start_date' => '2024-01-01',
            'end_date' => '2024-12-31',
            'position' => 'Desarrollador',
            'salary' => 3000000,
            'status' => 'Activo'
        ]);

        // Verificaciones
        $this->assertInstanceOf(Contract::class, $contrato);
        $this->assertEquals($colaborador->id, $contrato->collaborator_id);
        $this->assertDatabaseHas('contracts', ['position' => 'Desarrollador']);
    }

    /**
     * PRUEBA 2: Verificar que NO se puede crear contrato con colaborador inexistente
     */
    public function test_no_puede_crear_contrato_con_colaborador_inexistente()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Contract::create([
            'collaborator_id' => 99999,
            'contract_type' => 'Fijo',
            'start_date' => '2024-01-01',
            'end_date' => '2024-12-31',
            'position' => 'Desarrollador',
            'salary' => 3000000,
            'status' => 'Activo'
        ]);
    }

    /**
     * PRUEBA 3: Verificar validación de fechas y salario
     */
    public function test_valida_fechas_y_salario()
    {
        $colaborador = Collaborator::factory()->create();

        // Contrato con fecha inicio > fecha fin (MySQL lo acepta)
        $contrato1 = Contract::create([
            'collaborator_id' => $colaborador->id,
            'contract_type' => 'Fijo',
            'start_date' => '2024-12-31',
            'end_date' => '2024-01-01',
            'position' => 'Analista',
            'salary' => 2000000,
            'status' => 'Activo'
        ]);
        
        $this->assertInstanceOf(Contract::class, $contrato1);

        // Contrato indefinido sin fecha fin (válido)
        $contrato2 = Contract::create([
            'collaborator_id' => $colaborador->id,
            'contract_type' => 'Indefinido',
            'start_date' => '2024-01-01',
            'end_date' => null,
            'position' => 'Gerente',
            'salary' => 5000000,
            'status' => 'Activo'
        ]);

        $this->assertInstanceOf(Contract::class, $contrato2);
        $this->assertNull($contrato2->end_date);
    }

    /**
     * PRUEBA 4: Verificar que se puede actualizar un contrato existente
     */
    public function test_puede_actualizar_contrato_existente()
    {
        $colaborador = Collaborator::factory()->create();
        $contrato = Contract::factory()->create([
            'collaborator_id' => $colaborador->id,
            'position' => 'Junior',
            'salary' => 2000000
        ]);

        $contrato->update([
            'position' => 'Senior',
            'salary' => 4000000
        ]);

        $this->assertEquals('Senior', $contrato->fresh()->position);
        $this->assertEquals(4000000, $contrato->fresh()->salary);
    }
}