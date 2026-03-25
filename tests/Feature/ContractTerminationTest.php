<?php

namespace Tests\Feature;

use App\Models\Contract;
use App\Models\ContractTermination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContractTerminationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba: Verificar que se puede cambiar el estado de un contrato a "Terminado"
     */
    public function test_Prueba_Verificar_que_se_puede_cambiar_el_estado_de_un_contrato_a_Terminado()
    {
        $contrato = Contract::factory()->create([
            'status' => 'Activo'
        ]);

        $contrato->terminate('Despido voluntario');

        $this->assertEquals('Terminado', $contrato->fresh()->status);
        $this->assertTrue($contrato->termination()->exists());
    }

    /**
     * Prueba: Verificar que se registra correctamente la fecha y el motivo de la terminación
     */
    public function test_Prueba_Verificar_que_se_registra_correctamente_la_fecha_y_el_motivo_de_la_terminacion()
    {
        $contrato = Contract::factory()->create([
            'status' => 'Activo'
        ]);

        $motivo = 'Bajo rendimiento laboral';
        $contrato->terminate($motivo);

        $terminacion = $contrato->termination;

        $this->assertNotNull($terminacion);
        $this->assertEquals($motivo, $terminacion->reason);
        $this->assertNotNull($terminacion->termination_date);
        $this->assertDatabaseHas('contract_terminations', [
            'contract_id' => $contrato->id,
            'reason' => $motivo
        ]);
    }

    /**
     * Prueba: Verificar que no se puede terminar un contrato que ya ha finalizado
     */
    public function test_Prueba_Verificar_que_no_se_puede_terminar_un_contrato_que_ya_ha_finalizado()
    {
        $contratoFinalizado = Contract::factory()->create([
            'status' => 'Finalizado'
        ]);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('El contrato ya finalizó por su fecha de término');

        $contratoFinalizado->terminate('Intento de terminación');
    }
}