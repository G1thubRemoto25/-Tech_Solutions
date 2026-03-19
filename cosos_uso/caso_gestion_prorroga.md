# CP-003: Gestión de Prórrogas de Contratos

Prueba: Verificar que se puede añadir una prórroga (en tiempo o valor) a un contrato de tipo "Fijo" o "Prestación de Servicios".  
Prueba: Verificar que la fecha de finalización del contrato se actualiza correctamente al añadir una prórroga de tiempo.  
Prueba: Verificar que el sistema rechaza una prórroga para un contrato con estado "Terminado" o "Finalizado".  

---

# Caso de Prueba 1: Creación de prórroga válida

## 1. ID del Caso  
CP-PRO-301  

## 2. Nombre de la Prueba  
Validar que el sistema permite añadir una prórroga a un contrato válido.

## 3. Módulo / Funcionalidad  
Gestión de Prórrogas / Registro  

## 4. Descripción  
Este caso de prueba tiene como finalidad verificar que el sistema permita registrar una prórroga correctamente cuando el contrato es de tipo "Fijo" o "Prestación de Servicios".

## 5. Precondiciones  

1. El usuario debe estar registrado en el sistema.  
2. El usuario debe estar autenticado.  
3. Debe existir un contrato activo.  
4. El contrato debe ser de tipo "Fijo" o "Prestación de Servicios".  

## 6. Pasos para Ejecutar la Prueba  

1. El usuario inicia sesión.  
2. Accede al módulo de prórrogas.  
3. Selecciona un contrato válido.  
4. Ingresa los datos de la prórroga.  
5. Confirma el registro.  

## 7. Datos de Entrada  

- ID del contrato: 1  
- Tipo de prórroga: Tiempo  
- Tiempo adicional: 3 meses  
- Observación: Extensión por continuidad del servicio  

## 8. Resultado Esperado  

Se crea correctamente la prórroga y se registra en la tabla `extensions` (o `prorrogas`), asociada al contrato.

## 9. Resultado Real  

*(Se completará durante la ejecución de la prueba)*  

## 10. Estado  

- ( ) Pasa  
- ( ) Falla  

---

# Caso de Prueba 2: Actualización de fecha de finalización

## 1. ID del Caso  
CP-PRO-302  

## 2. Nombre de la Prueba  
Verificar que la fecha de finalización del contrato se actualiza correctamente al añadir una prórroga.

## 3. Módulo / Funcionalidad  
Gestión de Prórrogas / Lógica de negocio  

## 4. Descripción  
Este caso de prueba valida que al registrar una prórroga de tiempo, el sistema actualice automáticamente la fecha de finalización del contrato.

## 5. Precondiciones  

1. El usuario debe estar autenticado.  
2. Debe existir un contrato activo con fecha de fin definida.  

## 6. Pasos para Ejecutar la Prueba  

1. El usuario inicia sesión.  
2. Accede al módulo de prórrogas.  
3. Selecciona un contrato existente.  
4. Agrega una prórroga de tiempo.  
5. Guarda los cambios.  

## 7. Datos de Entrada  

- Fecha de fin actual: 31/12/2026  
- Tiempo adicional: 2 meses  

## 8. Resultado Esperado  

La nueva fecha de finalización del contrato se actualiza correctamente (ejemplo: 28/02/2027).

## 9. Resultado Real  

*(Se completará durante la ejecución de la prueba)*  

## 10. Estado  

- ( ) Pasa  
- ( ) Falla  

---

# Caso de Prueba 3: Rechazo de prórroga en contrato finalizado

## 1. ID del Caso  
CP-PRO-303  

## 2. Nombre de la Prueba  
Comprobar que el sistema rechaza una prórroga para contratos finalizados.

## 3. Módulo / Funcionalidad  
Gestión de Prórrogas / Validaciones  

## 4. Descripción  
Este caso de prueba verifica que el sistema no permita agregar prórrogas a contratos cuyo estado sea "Terminado" o "Finalizado".

## 5. Precondiciones  

1. El usuario debe estar autenticado.  
2. Debe existir un contrato con estado "Finalizado" o "Terminado".  

## 6. Pasos para Ejecutar la Prueba  

1. El usuario inicia sesión.  
2. Accede al módulo de prórrogas.  
3. Selecciona un contrato finalizado.  
4. Intenta agregar una prórroga.  

## 7. Datos de Entrada  

- ID del contrato: 5  
- Estado del contrato: Finalizado  
- Tiempo adicional: 1 mes  

## 8. Resultado Esperado  

1. El sistema rechaza la operación.  
2. Se muestra un mensaje indicando que no se pueden agregar prórrogas a contratos finalizados.  
3. No se guarda ningún registro en la base de datos.  

## 9. Resultado Real  

*(Se completará durante la ejecución de la prueba)*  

## 10. Estado  

- ( ) Pasa  
- ( ) Falla  