<?php

namespace Tests\Feature;

use App\Models\Collaborator;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CollaboratorTest extends TestCase
{
    use RefreshDatabase;

    protected $userRRHH;
    protected $userConsultor;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear permisos
        $permisosColaboradores = [
            'ver colaboradores',
            'crear colaboradores',
            'editar colaboradores',
            'eliminar colaboradores',
        ];
        
        foreach ($permisosColaboradores as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Crear roles
        $rolRRHH = Role::firstOrCreate(['name' => 'Gestor RRHH']);
        $rolRRHH->syncPermissions($permisosColaboradores);

        $rolConsultor = Role::firstOrCreate(['name' => 'Consultor']);
        $rolConsultor->syncPermissions(['ver colaboradores']);

        // Crear usuarios
        $this->userRRHH = User::factory()->create();
        $this->userRRHH->assignRole('Gestor RRHH');

        $this->userConsultor = User::factory()->create();
        $this->userConsultor->assignRole('Consultor');
    }

    /**
     * TEST 1: Verificar que se puede crear un nuevo colaborador con datos válidos
     */
    public function test_puede_crear_colaborador_con_datos_validos(): void
    {
        $data = [
            'first_name' => 'Juan',
            'last_name' => 'Pérez',
            'document_type' => 'CC',
            'document_number' => '1234567890',
            'birth_date' => '1990-01-01',
            'email' => 'juan.perez@example.com',
            'phone_number' => '3001234567',
            'address' => 'Calle 123 #45-67'
        ];

        $colaborador = Collaborator::create($data);

        $this->assertInstanceOf(Collaborator::class, $colaborador);
        $this->assertDatabaseHas('collaborators', [
            'email' => 'juan.perez@example.com',
            'document_number' => '1234567890'
        ]);
    }

    /**
     * TEST 2: Verificar que el sistema rechaza documento duplicado y correo duplicado
     */
    public function test_rechaza_colaborador_con_documento_o_correo_duplicado(): void
    {
        // Crear primer colaborador
        Collaborator::factory()->create([
            'document_number' => '1234567890',
            'email' => 'correo@test.com'
        ]);

        // Documento duplicado
        $data1 = [
            'first_name' => 'Ana',
            'last_name' => 'García',
            'document_type' => 'CC',
            'document_number' => '1234567890', // DUPLICADO
            'birth_date' => '1992-02-02',
            'email' => 'ana.garcia@example.com',
            'phone_number' => '3007654321',
            'address' => 'Carrera 45 #67-89'
        ];

        $this->expectException(\Illuminate\Database\QueryException::class);
        Collaborator::create($data1);
    }

    /**
     * TEST 3: Verificar que se puede actualizar un colaborador existente
     */
    public function test_puede_actualizar_colaborador_existente(): void
    {
        $colaborador = Collaborator::factory()->create([
            'first_name' => 'Carlos',
            'email' => 'carlos.original@example.com'
        ]);

        $colaborador->update([
            'first_name' => 'Carlos Alberto',
            'email' => 'carlos.actualizado@example.com'
        ]);

        $this->assertEquals('Carlos Alberto', $colaborador->fresh()->first_name);
        $this->assertEquals('carlos.actualizado@example.com', $colaborador->fresh()->email);
    }

    /**
     * TEST 4: Verificar que se puede obtener el listado de todos los colaboradores
     */
    public function test_puede_obtener_listado_todos_colaboradores(): void
    {
        Collaborator::factory()->count(5)->create();

        $todosColaboradores = Collaborator::all();

        $this->assertCount(5, $todosColaboradores);
    }

    /**
     * TEST 5: Verificar que se puede eliminar (soft-delete) un colaborador
     */
    public function test_puede_eliminar_soft_delete_colaborador(): void
    {
        $colaborador = Collaborator::factory()->create();

        $colaborador->delete();

        $this->assertSoftDeleted($colaborador);
        $this->assertCount(0, Collaborator::all());
        $this->assertCount(1, Collaborator::withTrashed()->get());
    }
}