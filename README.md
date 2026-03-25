# Tech Solutions SAS - Sistema de Gestión de RRHH

Sistema backend para la gestión de recursos humanos de Tech Solutions SAS, desarrollado con Laravel 11 siguiendo metodología TDD y Git Flow.

---

## Estado del Proyecto

- CP-001: Gestión de Colaboradores (Completado)
- CP-002: Gestión de Contratos (Completado)
- CP-003: Gestión de Prórrogas (Completado)
- CP-004: Terminación de Contratos (Completado)

---

## Arquitectura

### Stack Tecnológico
- **Framework:** Laravel 11
- **Base de Datos:** MySQL 8.0+
- **Testing:** PHPUnit (TDD)
- **Roles y Permisos:** Spatie/laravel-permission
- **Control de Versiones:** Git con Git Flow

---

## Roles y Permisos Implementados

### Roles del Sistema

| Rol | Descripción | Permisos |
|-----|-------------|----------|
| Admin | Superusuario | Todos los permisos |
| Gestor RRHH | Gestión completa | CRUD en todos los módulos |
| Consultor | Consulta | Solo lectura |

---

### Permisos por Módulo

#### CP-001: Colaboradores
- `ver colaboradores`
- `crear colaboradores`
- `editar colaboradores`
- `eliminar colaboradores`

#### CP-002: Contratos
- `ver contratos`
- `crear contratos`
- `editar contratos`
- `eliminar contratos`

#### CP-003: Prórrogas
- `ver prorrogas`
- `crear prorrogas`
- `editar prorrogas`
- `eliminar prorrogas`

#### CP-004: Terminaciones
- `ver terminaciones`
- `crear terminaciones`
- `editar terminaciones`
- `eliminar terminaciones`

---

## Modelo de Datos

### Tabla: collaborators

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador |
| first_name | string | Nombres |
| last_name | string | Apellidos |
| document_type | enum | CC, CE, PPT |
| document_number | string | Documento |
| birth_date | date | Fecha nacimiento |
| email | string | Correo |
| phone_number | string | Teléfono |
| address | text | Dirección |
| deleted_at | timestamp | Soft delete |
| timestamps | timestamp | created_at, updated_at |

---

### Tabla: contracts

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador |
| collaborator_id | bigint | FK |
| contract_type | string | Tipo |
| start_date | date | Inicio |
| end_date | date | Fin |
| salary | decimal | Salario |
| status | string | Estado |
| timestamps | timestamp | |

---

### Tabla: extensions (prórrogas)

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador |
| contract_id | bigint | FK |
| type | string | tiempo / valor |
| extra_time | integer | Meses |
| extra_value | decimal | Valor |
| observations | text | Observaciones |
| timestamps | timestamp | |

---

### Tabla: terminations

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador |
| contract_id | bigint | FK |
| termination_date | date | Fecha |
| reason | text | Motivo |
| timestamps | timestamp | |

---

## Tests

### Ejecutar todos los tests
```bash
php artisan test

Ejecutar por módulo.
php artisan test --filter CollaboratorTest
php artisan test --filter ContractTest
php artisan test --filter ContractExtensionTest
php artisan test --filter ContractTerminationTest

Resultados Esperados
CP-001: Colaboradores
PASS  Tests\Feature\CollaboratorTest
✓ puede crear colaborador con datos validos
✓ rechaza colaborador con documento o correo duplicado
✓ puede actualizar colaborador existente
✓ puede obtener listado todos colaboradores
✓ puede eliminar soft delete colaborador

Tests: 5 passed
CP-002: Contratos
PASS  Tests\Feature\ContractTest
✓ puede crear contrato con colaborador existente
✓ no puede crear contrato con colaborador inexistente
✓ valida fechas y salario
✓ puede actualizar contrato existente

Tests: 4 passed
CP-003: Prórrogas
PASS  Tests\Feature\ContractExtensionTest
✓ se puede añadir prórroga a contrato
✓ actualiza fecha finalizacion
✓ rechaza prórroga en contrato finalizado

Tests: 3 passed
CP-004: Terminación de Contratos
PASS  Tests\Feature\ContractTerminationTest
✓ puede cambiar estado a terminado
✓ registra fecha y motivo correctamente
✓ no permite terminar contrato ya finalizado

Tests: 3 passed
Casos de Uso CP-004

Terminar Contrato Anticipadamente

Verificar que se puede cambiar el estado de un contrato a "Terminado".
Verificar que se registra correctamente la fecha y el motivo de la terminación.
Verificar que no se puede terminar un contrato que ya ha finalizado.

Instalación
Requisitos
PHP 8.2+
Composer
MySQL
Git
Pasos
git clone https://github.com/G1thubRemoto25/-Tech_Solutions.git
cd techsolutions-rrhh

composer install

cp .env.example .env

php artisan key:generate
php artisan migrate --seed


Git Flow
Ramas
main
develop
feature/*
Features
feature/gestionar-colaboradores
feature/gestionar-contratos
feature/gestionar-prorrogas
feature/terminar-contratos

Estructura del Proyecto
techsolutions-rrhh
├── app
│   ├── Models
│   │   ├── Collaborator.php
│   │   ├── Contract.php
│   │   ├── Extension.php
│   │   └── Termination.php
│   └── Http
│       └── Controllers
├── database
├── tests
│   └── Feature
│       ├── CollaboratorTest.php
│       ├── ContractTest.php
│       ├── ContractExtensionTest.php
│       └── ContractTerminationTest.php
└── README.md

---