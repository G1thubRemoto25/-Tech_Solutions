# Tech Solutions SAS - Sistema de Gestión de RRHH

Sistema backend para la gestión de recursos humanos de Tech Solutions SAS, desarrollado con Laravel 11 siguiendo metodología TDD y Git Flow.

##  Estado del Proyecto

##  Arquitectura

### **Stack Tecnológico**
- **Framework:** Laravel 11
- **Base de Datos:** MySQL 8.0+
- **Testing:** PHPUnit (TDD)
- **Roles y Permisos:** Spatie/laravel-permission
- **Control de Versiones:** Git con Git Flow

##  Roles y Permisos Implementados

### **Roles del Sistema**

| Rol | Descripción | Permisos |
|-----|-------------|----------|
| **Admin** | Superusuario | Todos los permisos del sistema |
| **Gestor RRHH** | Gestión completa de RRHH | CRUD en todos los módulos |
| **Consultor** | Consulta de información | Solo lectura en todos los módulos |

### **Permisos por Módulo (CP-001)**

#### Colaboradores
-  `ver colaboradores`
-  `crear colaboradores`
-  `editar colaboradores`
-  `eliminar colaboradores`

#### Próximos Módulos (Permisos creados)
- Contratos: ver, crear, editar, eliminar
- Prórrogas: ver, crear, editar, eliminar
- Terminaciones: ver, crear, editar, eliminar

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

##  Tests

### **Ejecutar Tests**
```bash
# Ejecutar todos los tests
php artisan test

# Ejecutar solo tests de colaboradores
php artisan test --filter CollaboratorTest
Resultado Esperado
text
PASS  Tests\Feature\CollaboratorTest
  ✓ puede crear colaborador con datos validos
  ✓ rechaza colaborador con documento o correo duplicado
  ✓ puede actualizar colaborador existente
  ✓ puede obtener listado todos colaboradores
  ✓ puede eliminar soft delete colaborador

Tests:  5 passed
 Instalación
Requisitos Previos
PHP 8.2+

Composer

MySQL 8.0+

Git

Pasos de Instalación
bash
# Clonar repositorio
git clone  https://github.com/G1thubRemoto25/-Tech_Solutions.git
cd techsolutions-rrhh

# Instalar dependencias
composer install

# Copiar archivo de entorno
cp .env.example .env

# Configurar base de datos en .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=techsolutions_rrhh
DB_USERNAME=root
DB_PASSWORD=

# Generar key
php artisan key:generate

# Ejecutar migraciones y seeders
php artisan migrate --seed

# Ejecutar tests
php artisan test
Usuarios de Prueba
Rol	Email	Password
Admin	admin@techsolutions.com	password
Gestor RRHH	rrhh@techsolutions.com	password
Consultor	consultor@techsolutions.com	password
 Git Flow
Estructura de Ramas
main - Código de producción estable

develop - Rama principal de desarrollo

feature/* - Ramas para nuevas funcionalidades

release/* - Ramas para preparar lanzamientos

hotfix/* - Ramas para correcciones urgentes

Ramas Actuales
 main - Versión estable v1.0.0

 develop - Desarrollo activo

 feature/gestionar-colaboradores - Completado

Tags
v1.0.0 - Release CP-001: Gestión de Colaboradores

 Estructura del Proyecto
text
 techsolutions-rrhh
├──  app
│   ├──  Models
│   │   └──  Collaborator.php
│   └──  Http
│       └──  Controllers
│           └──  CollaboratorController.php
├──  database
│   ├──  migrations
│   │   └──  [timestamp]_create_collaborators_table.php
│   ├──  factories
│   │   └──  CollaboratorFactory.php
│   └──  seeders
│       ├──  DatabaseSeeder.php
│       ├──  RolePermissionSeeder.php
│       └──  CollaboratorSeeder.php
├──  tests
│   └──  Feature
│       └──  CollaboratorTest.php
└──  README.md