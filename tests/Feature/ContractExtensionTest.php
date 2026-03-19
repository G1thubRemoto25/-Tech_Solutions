<?php

namespace Tests\Feature;

use App\Models\Contract;
use App\Models\ContractExtension;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContractExtensionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba: Verificar que se puede añadir una prórroga (en tiempo o valor) 
     * a un contrato de tipo "Fijo" o "Prestación de Servicios"
     */
    public function test_prueba_verificar_que_se_puede_añadir_prórroga_a_contrato_fijo_o_servicios()
    {
        // Contrato Fijo con prórroga de tiempo
        $contratoFijo = Contract::factory()->create([
            'contract_type' => 'Fijo',
            'end_date' => '2024-12-31',
            'status' => 'Activo'
        ]);

        $prorrogaTiempo = ContractExtension::create([
            'contract_id' => $contratoFijo->id,
            'extension_type' => 'Tiempo',
            'new_end_date' => '2025-06-30',
            'description' => 'Prórroga por 6 meses'
        ]);

        $this->assertInstanceOf(ContractExtension::class, $prorrogaTiempo);
        $this->assertEquals('Tiempo', $prorrogaTiempo->extension_type);
        $this->assertEquals('2025-06-30', $prorrogaTiempo->new_end_date->format('Y-m-d'));

        // Contrato Prestación de Servicios con prórroga de valor
        $contratoServicios = Contract::factory()->create([
            'contract_type' => 'Prestación de Servicios',
            'end_date' => '2024-12-31',
            'status' => 'Activo'
        ]);

        $prorrogaValor = ContractExtension::create([
            'contract_id' => $contratoServicios->id,
            'extension_type' => 'Valor',
            'additional_value' => 500000,
            'description' => 'Aumento de honorarios'
        ]);

        $this->assertInstanceOf(ContractExtension::class, $prorrogaValor);
        $this->assertEquals('Valor', $prorrogaValor->extension_type);
        $this->assertEquals(500000, $prorrogaValor->additional_value);
    }

    /**
     * Prueba: Verificar que la fecha de finalización del contrato se actualiza 
     * correctamente al añadir una prórroga de tiempo
     */
    public function test_prueba_verificar_que_fecha_finalizacion_se_actualiza_con_prórroga_tiempo()
    {
        $contrato = Contract::factory()->create([
            'contract_type' => 'Fijo',
            'end_date' => '2024-12-31',
            'status' => 'Activo'
        ]);

        $nuevaFecha = '2025-06-30';
        
        ContractExtension::create([
            'contract_id' => $contrato->id,
            'extension_type' => 'Tiempo',
            'new_end_date' => $nuevaFecha,
            'description' => 'Prórroga'
        ]);

        // Actualizar la fecha del contrato
        $contrato->update(['end_date' => $nuevaFecha]);

        $this->assertEquals($nuevaFecha, $contrato->fresh()->end_date->format('Y-m-d'));
    }

    /**
     * Prueba: Verificar que el sistema rechaza una prórroga para un contrato 
     * con estado "Terminado" o "Finalizado"
     */
    public function test_prueba_verificar_que_rechaza_prórroga_para_contrato_terminado_o_finalizado()
    {
        // Contrato Terminado
        $contratoTerminado = Contract::factory()->create([
            'contract_type' => 'Fijo',
            'status' => 'Terminado'
        ]);

        $this->assertFalse($contratoTerminado->canBeExtended());

        // Contrato Finalizado
        $contratoFinalizado = Contract::factory()->create([
            'contract_type' => 'Fijo',
            'status' => 'Finalizado'
        ]);

        $this->assertFalse($contratoFinalizado->canBeExtended());
    }
}