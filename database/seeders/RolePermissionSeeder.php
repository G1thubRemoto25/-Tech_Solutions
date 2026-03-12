<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiar caché de permisos
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Crear Permisos para Colaboradores (CP-001)
        $colaboradorPermissions = [
            'ver colaboradores',
            'crear colaboradores',
            'editar colaboradores',
            'eliminar colaboradores',
        ];

        // Permisos para futuros módulos (los creamos ya para tener la estructura)
        $contratoPermissions = [
            'ver contratos',
            'crear contratos',
            'editar contratos',
            'eliminar contratos',
        ];

        $prorrogaPermissions = [
            'ver prorrogas',
            'crear prorrogas',
            'editar prorrogas',
            'eliminar prorrogas',
        ];

        $terminacionPermissions = [
            'ver terminaciones',
            'crear terminaciones',
            'editar terminaciones',
            'eliminar terminaciones',
        ];

        // Fusionar todos los permisos
        $allPermissions = array_merge(
            $colaboradorPermissions,
            $contratoPermissions,
            $prorrogaPermissions,
            $terminacionPermissions
        );

        // Crear cada permiso
        foreach ($allPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 2. Crear Roles

        // Rol: Gestor RRHH (tiene TODOS los permisos)
        $rolRRHH = Role::firstOrCreate(['name' => 'Gestor RRHH']);
        $rolRRHH->syncPermissions($allPermissions);

        // Rol: Consultor (solo permisos de ver)
        $rolConsultor = Role::firstOrCreate(['name' => 'Consultor']);
        $rolConsultor->syncPermissions([
            'ver colaboradores',
            'ver contratos',
            'ver prorrogas',
            'ver terminaciones',
        ]);

        // Rol: Admin (todos los permisos + especiales)
        $rolAdmin = Role::firstOrCreate(['name' => 'Admin']);
        $rolAdmin->syncPermissions($allPermissions);

        // 3. Crear usuarios de prueba con roles

        // Usuario Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@techsolutions.com'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('password'),
            ]
        );
        $admin->assignRole('Admin');

        // Usuario RRHH
        $rrhh = User::firstOrCreate(
            ['email' => 'rrhh@techsolutions.com'],
            [
                'name' => 'Gestor RRHH',
                'password' => bcrypt('password'),
            ]
        );
        $rrhh->assignRole('Gestor RRHH');

        // Usuario Consultor
        $consultor = User::firstOrCreate(
            ['email' => 'consultor@techsolutions.com'],
            [
                'name' => 'Consultor RRHH',
                'password' => bcrypt('password'),
            ]
        );
        $consultor->assignRole('Consultor');

        $this->command->info('Roles y permisos creados exitosamente!');
    }
}