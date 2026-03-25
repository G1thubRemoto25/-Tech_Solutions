
# Caso de Prueba 1: Registro de un nuevo colaborador

Prueba: Verificar que se puede crear un nuevo colaborador con datos válidos.
Prueba: Verificar que el sistema rechaza la creación de un colaborador con un número de documento duplicado.
Prueba: Verificar que se puede actualizar la información de un colaborador existente.
Prueba: Verificar que se puede obtener el listado de todos los colaboradores.
Prueba: Verificar que se puede eliminar (o desactivar mediante soft-delete) un colaborador

## 1. ID del Caso
CP-COL-101

## 2. Nombre de la Prueba
Validar que el sistema permite registrar un nuevo colaborador utilizando información válida.

## 3. Módulo / Funcionalidad
Administración de Colaboradores / Registro

## 4. Descripción
Este caso de prueba tiene como finalidad confirmar que el sistema permite agregar correctamente un nuevo colaborador cuando los datos ingresados cumplen con todas las reglas de validación establecidas.

## 5. Precondiciones

1. Debe existir un usuario válido en el sistema.
2. El usuario debe encontrarse autenticado.
3. El colaborador que se desea registrar no debe existir previamente.
4. La edad del colaborador debe ser mayor o igual a 18 años.

## 6. Pasos para Ejecutar la Prueba

1. El usuario inicia sesión en el sistema.
2. Accede al módulo de gestión de colaboradores.
3. Selecciona la opción para registrar un nuevo colaborador.
4. Introduce la información solicitada.
5. Confirma el registro.

## 7. Datos de Entrada

- Nombre: Mariana  
- Apellido: Rodríguez  
- Tipo de documento: CC  
- Número de documento: 1098765432  
- Fecha de nacimiento: 15/04/1998  
- Correo electrónico: mariana.rodriguez@mail.com  
- Teléfono: 3104567890  
- Dirección: Carrera 12 # 45-30  

## 8. Resultado Esperado

Se crea un nuevo registro del colaborador en la tabla `collaborators` de la base de datos.

## 9. Resultado Real

*(Se completará durante la ejecución de la prueba)*

## 10. Estado

- ( ) Pasa  
- ( ) Falla  

---

# Caso de Prueba 2: Validación de documento o correo duplicado

## 1. ID del Caso
CP-COL-102

## 2. Nombre de la Prueba
Comprobar que el sistema rechaza el registro cuando el documento o correo ya existen.

## 3. Módulo / Funcionalidad
Administración de Colaboradores / Validaciones

## 4. Descripción
Esta prueba verifica que el sistema no permita registrar un nuevo colaborador cuando el número de documento o el correo electrónico ya están registrados en la base de datos.

## 5. Precondiciones

1. El usuario debe estar registrado en el sistema.
2. El usuario debe estar autenticado.
3. Debe existir previamente un colaborador con el mismo documento o correo.

## 6. Pasos para Ejecutar la Prueba

1. El usuario accede al sistema con sus credenciales.
2. Ingresa al módulo de colaboradores.
3. Intenta registrar un colaborador utilizando datos que ya existen en el sistema.

## 7. Datos de Entrada

- Nombre: Carlos  
- Apellido: Mendoza  
- Tipo de documento: CC  
- Número de documento: (duplicado)  
- Fecha de nacimiento: 12/09/1995  
- Correo electrónico: (duplicado)  
- Teléfono: 3129876543  
- Dirección: Avenida 8 # 22-14  

## 8. Resultado Esperado

1. El sistema rechaza el registro del colaborador.  
2. Se muestra un mensaje indicando que el documento o el correo ya están registrados.  
3. No se guarda ningún registro nuevo en la base de datos.

## 9. Resultado Real

*(Se completará durante la ejecución de la prueba)*

## 10. Estado

- ( ) Pasa  
- ( ) Falla  

---

# Caso de Prueba 3: Actualización de datos de colaborador

## 1. ID del Caso
CP-COL-103

## 2. Nombre de la Prueba
Validar que el sistema permite actualizar la información de un colaborador existente.

## 3. Módulo / Funcionalidad
Administración de Colaboradores / Actualización

## 4. Descripción
Este caso de prueba verifica que un usuario autenticado pueda modificar los datos de un colaborador previamente registrado.

## 5. Precondiciones

1. El usuario debe existir en el sistema.
2. El usuario debe haber iniciado sesión.
3. El colaborador debe estar registrado en la base de datos.

## 6. Pasos para Ejecutar la Prueba

1. El usuario accede al sistema.
2. Ingresa al módulo de colaboradores.
3. Selecciona un colaborador existente.
4. Modifica algunos de sus datos.
5. Guarda los cambios.

## 7. Datos de Entrada

- Teléfono actualizado: 3150001234  
- Dirección actualizada: Calle 50 # 18-90  

## 8. Resultado Esperado

La información del colaborador se actualiza correctamente en la tabla `collaborators`.

## 9. Resultado Real

*(Se completará durante la ejecución de la prueba)*

## 10. Estado

- ( ) Pasa  
- ( ) Falla  

---

# Caso de Prueba 4: Consulta de lista de colaboradores

## 1. ID del Caso
CP-COL-104

## 2. Nombre de la Prueba
Verificar que el sistema puede mostrar el listado completo de colaboradores.

## 3. Módulo / Funcionalidad
Administración de Colaboradores / Consulta

## 4. Descripción
Esta prueba permite validar que el sistema pueda recuperar y mostrar todos los colaboradores almacenados en la base de datos.

## 5. Precondiciones

1. El usuario debe estar registrado en el sistema.
2. El usuario debe haber iniciado sesión.
3. Deben existir colaboradores registrados previamente.

## 6. Pasos para Ejecutar la Prueba

1. El usuario inicia sesión en el sistema.
2. Accede al módulo de colaboradores.
3. Consulta el listado de colaboradores registrados.

## 7. Datos de Entrada

No aplica.

## 8. Resultado Esperado

El sistema devuelve correctamente la lista de todos los colaboradores registrados.

## 9. Resultado Real

*(Se completará durante la ejecución de la prueba)*

## 10. Estado

- ( ) Pasa  
- ( ) Falla  

---

# Caso de Prueba 5: Eliminación o desactivación de colaborador

## 1. ID del Caso
CP-COL-105

## 2. Nombre de la Prueba
Confirmar que el sistema permite eliminar o desactivar un colaborador.

## 3. Módulo / Funcionalidad
Administración de Colaboradores / Eliminación

## 4. Descripción
Este caso de prueba verifica que un usuario autenticado pueda eliminar o desactivar un colaborador existente mediante soft-delete.

## 5. Precondiciones

1. El usuario debe estar registrado.
2. El usuario debe estar autenticado.
3. El colaborador debe existir en la base de datos.

## 6. Pasos para Ejecutar la Prueba

1. El usuario inicia sesión en el sistema.
2. Ingresa al módulo de colaboradores.
3. Selecciona un colaborador registrado.
4. Ejecuta la opción de eliminar o desactivar.

## 7. Datos de Entrada

- ID del colaborador existente.

## 8. Resultado Esperado

El colaborador se elimina o se marca como desactivado en la tabla `collaborators`.

## 9. Resultado Real

*(Se completará durante la ejecución de la prueba)*

## 10. Estado

- ( ) Pasa  
- ( ) Falla  