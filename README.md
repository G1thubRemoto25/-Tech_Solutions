# Tech Solutions SAS - Sistema de Gestión de RRHH

Sistema backend para la gestión de recursos humanos de Tech Solutions SAS, desarrollado con Laravel 11 siguiendo metodología TDD y Git Flow.

##  Estado del Proyecto

-  CP-001: Gestión de Colaboradores (Completado)
-  CP-002: Gestión de Contratos (Completado)
-  CP-003: Gestión de Prórrogas (Completado)

---

##  Arquitectura

### **Stack Tecnológico**
- **Framework:** Laravel 11
- **Base de Datos:** MySQL 8.0+
- **Testing:** PHPUnit (TDD)
- **Roles y Permisos:** Spatie/laravel-permission
- **Control de Versiones:** Git con Git Flow

---

##  Roles y Permisos Implementados

### **Roles del Sistema**

| Rol | Descripción | Permisos |
|-----|-------------|----------|
| **Admin** | Superusuario | Todos los permisos del sistema |
| **Gestor RRHH** | Gestión completa de RRHH | CRUD en todos los módulos |
| **Consultor** | Consulta de información | Solo lectura en todos los módulos |

### **Permisos por Módulo**

#### CP-001: Colaboradores
-  `ver colaboradores`
-  `crear colaboradores`
-  `editar colaboradores`
-  `eliminar colaboradores`

#### CP-002: Contratos
-  `ver contratos`
-  `crear contratos`
-  `editar contratos`
-  `eliminar contratos`

#### CP-003: Prórrogas
-  `ver prorrogas`
-  `crear prorrogas`
-  `editar prorrogas`
-  `eliminar prorrogas`

#### Próximos Módulos
- Terminaciones: ver, crear, editar, eliminar

---

##  Modelo de Datos

### **Tabla: collaborators**

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador único |
| first_name | string | Nombres |
| last_name | string | Apellidos |
| document_type | enum | CC, CE, PPT |
| document_number | string (unique) | Número de documento |
| birth_date | date | Fecha de nacimiento |
| email | string (unique) | Correo electrónico |
| phone_number | string | Teléfono |
| address | text | Dirección |
| deleted_at | timestamp | Soft delete |
| timestamps | timestamp | created_at, updated_at |

---

### **Tabla: contracts**

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador único |
| collaborator_id | bigint (FK) | Relación con colaborador |
| contract_type | string | Tipo de contrato |
| start_date | date | Fecha de inicio |
| end_date | date | Fecha de fin |
| salary | decimal | Salario |
| timestamps | timestamp | created_at, updated_at |

---

### **Tabla: prorrogas (extensions)**

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint | Identificador único |
| contract_id | bigint (FK) | Relación con contrato |
| type | string | Tipo de prórroga (tiempo o valor) |
| extra_time | integer | Tiempo adicional (meses) |
| extra_value | decimal | Valor adicional |
| observations | text | Observaciones |
| timestamps | timestamp | created_at, updated_at |

---

##  Tests

### **Ejecutar Tests**
```bash
php artisan test

php artisan test --filter CollaboratorTest
php artisan test --filter ContractTest
php artisan test --filter ProrrogaTest
Resultado Esperado
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
✓ rechaza contrato con colaborador inexistente
✓ valida correctamente fechas y salario
✓ puede actualizar contrato existente

Tests: 4 passed
CP-003: Prórrogas
PASS  Tests\Feature\ProrrogaTest
✓ puede crear prorroga para contrato valido
✓ actualiza correctamente la fecha de finalizacion
✓ rechaza prorroga para contrato finalizado

Tests: 3 passed
Instalación
Requisitos Previos

PHP 8.2+

Composer

MySQL 8.0+

Git

Pasos de Instalación
git clone https://github.com/G1thubRemoto25/-Tech_Solutions.git
cd techsolutions-rrhh

composer install

cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=techsolutions_rrhh
DB_USERNAME=root
DB_PASSWORD=

php artisan key:generate

php artisan migrate --seed

php artisan test
Usuarios de Prueba
Rol	Email	Password
Admin	admin@techsolutions.com
	password
Gestor RRHH	rrhh@techsolutions.com
	password
Consultor	consultor@techsolutions.com
	password
Git Flow
Estructura de Ramas

main

develop

feature/*

release/*

hotfix/*

Ramas Actuales

main - v1.0.0

develop

feature/gestionar-colaboradores

feature/gestionar-contratos

feature/gestionar-prorrogas

Tags

v1.0.0 - CP-001

v1.1.0 - CP-002

v1.2.0 - CP-003

Estructura del Proyecto
techsolutions-rrhh
├── app
│   ├── Models
│   │   ├── Collaborator.php
│   │   ├── Contract.php
│   │   └── Prorroga.php
│   └── Http
│       └── Controllers
│           ├── CollaboratorController.php
│           ├── ContractController.php
│           └── ProrrogaController.php
├── database
│   ├── migrations
│   ├── factories
│   └── seeders
├── tests
│   └── Feature
│       ├── CollaboratorTest.php
│       ├── ContractTest.php
│       └── ProrrogaTest.php
└── README.md