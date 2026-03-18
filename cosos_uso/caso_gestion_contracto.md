# CP-002: Gestionar Contratos de Colaboradores

Prueba: Verificar que se puede crear un contrato y asociarlo a un colaborador existente.  
Prueba: Verificar que no se puede crear un contrato para un colaborador inexistente.  
Prueba: Verificar que los campos de fecha y salario son validados correctamente.  
Prueba: Verificar que se puede actualizar un contrato existente.  

---

# Caso de Prueba 1: Creación de contrato asociado a colaborador

## 1. ID del Caso  
CP-CON-201  

## 2. Nombre de la Prueba  
Validar que el sistema permite crear un contrato y asociarlo a un colaborador existente.

## 3. Módulo / Funcionalidad  
Gestión de Contratos / Registro  

## 4. Descripción  
Este caso de prueba tiene como finalidad confirmar que el sistema permite registrar correctamente un contrato cuando los datos ingresados son válidos y el colaborador existe en la base de datos.

## 5. Precondiciones  

1. Debe existir un usuario válido en el sistema.  
2. El usuario debe estar autenticado.  
3. Debe existir un colaborador previamente registrado.  

## 6. Pasos para Ejecutar la Prueba  

1. El usuario inicia sesión en el sistema.  
2. Accede al módulo de gestión de contratos.  
3. Selecciona la opción para crear un nuevo contrato.  
4. Introduce la información solicitada.  
5. Selecciona un colaborador existente.  
6. Confirma el registro.  

## 7. Datos de Entrada  

- ID del colaborador: 1  
- Tipo de contrato: Indefinido  
- Fecha de inicio: 01/03/2026  
- Fecha de fin: 01/03/2027  
- Salario: 2000000  

## 8. Resultado Esperado  

Se crea un nuevo registro del contrato en la tabla `contracts` asociado correctamente al colaborador.

## 9. Resultado Real  

*(Se completará durante la ejecución de la prueba)*  

## 10. Estado  

- ( ) Pasa  
- ( ) Falla  

---

# Caso de Prueba 2: Validación de colaborador inexistente

## 1. ID del Caso  
CP-CON-202  

## 2. Nombre de la Prueba  
Comprobar que el sistema rechaza la creación de un contrato para un colaborador inexistente.

## 3. Módulo / Funcionalidad  
Gestión de Contratos / Validaciones  

## 4. Descripción  
Esta prueba verifica que el sistema no permita registrar un contrato cuando el colaborador asociado no existe en la base de datos.

## 5. Precondiciones  

1. El usuario debe estar registrado en el sistema.  
2. El usuario debe estar autenticado.  
3. No debe existir el colaborador con el ID ingresado.  

## 6. Pasos para Ejecutar la Prueba  

1. El usuario accede al sistema.  
2. Ingresa al módulo de contratos.  
3. Intenta crear un contrato con un ID de colaborador inexistente.  

## 7. Datos de Entrada  

- ID del colaborador: 9999  
- Tipo de contrato: Temporal  
- Fecha de inicio: 01/03/2026  
- Salario: 1500000  

## 8. Resultado Esperado  

1. El sistema rechaza el registro del contrato.  
2. Se muestra un mensaje indicando que el colaborador no existe.  
3. No se guarda ningún registro en la base de datos.  

## 9. Resultado Real  

*(Se completará durante la ejecución de la prueba)*  

## 10. Estado  

- ( ) Pasa  
- ( ) Falla  

---

# Caso de Prueba 3: Validación de fechas y salario

## 1. ID del Caso  
CP-CON-203  

## 2. Nombre de la Prueba  
Verificar que los campos de fecha y salario son validados correctamente.

## 3. Módulo / Funcionalidad  
Gestión de Contratos / Validaciones  

## 4. Descripción  
Este caso de prueba permite validar que el sistema controle correctamente los errores en los campos de fechas y salario al momento de crear un contrato.

## 5. Precondiciones  

1. El usuario debe estar registrado en el sistema.  
2. El usuario debe estar autenticado.  
3. Debe existir un colaborador válido.  

## 6. Pasos para Ejecutar la Prueba  

1. El usuario inicia sesión.  
2. Accede al módulo de contratos.  
3. Intenta registrar un contrato con datos inválidos.  
4. Confirma el registro.  

## 7. Datos de Entrada  

- ID del colaborador: 1  
- Fecha de inicio: 10/03/2026  
- Fecha de fin: 05/03/2026  
- Salario: -500000  

## 8. Resultado Esperado  

1. El sistema rechaza el registro.  
2. Se muestran mensajes de error indicando:  
   - Fecha de fin inválida.  
   - El salario debe ser un valor positivo.  
3. No se guarda el contrato en la base de datos.  

## 9. Resultado Real  

*(Se completará durante la ejecución de la prueba)*  

## 10. Estado  

- ( ) Pasa  
- ( ) Falla  

---

# Caso de Prueba 4: Actualización de contrato

## 1. ID del Caso  
CP-CON-204  

## 2. Nombre de la Prueba  
Validar que el sistema permite actualizar un contrato existente.

## 3. Módulo / Funcionalidad  
Gestión de Contratos / Actualización  

## 4. Descripción  
Este caso de prueba verifica que un usuario autenticado pueda modificar los datos de un contrato previamente registrado.

## 5. Precondiciones  

1. El usuario debe existir en el sistema.  
2. El usuario debe haber iniciado sesión.  
3. El contrato debe estar registrado en la base de datos.  

## 6. Pasos para Ejecutar la Prueba  

1. El usuario accede al sistema.  
2. Ingresa al módulo de contratos.  
3. Selecciona un contrato existente.  
4. Modifica algunos de sus datos.  
5. Guarda los cambios.  

## 7. Datos de Entrada  

- Salario actualizado: 2500000  
- Fecha de fin actualizada: 31/12/2026  

## 8. Resultado Esperado  

La información del contrato se actualiza correctamente en la tabla `contracts`.

## 9. Resultado Real  

*(Se completará durante la ejecución de la prueba)*  

## 10. Estado  

- ( ) Pasa  
- ( ) Falla  