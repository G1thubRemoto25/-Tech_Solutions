# CP-004: Terminación de Contratos

Prueba: Verificar que se puede cambiar el estado de un contrato a "Terminado".  
Prueba: Verificar que se registra correctamente la fecha y el motivo de la terminación.  
Prueba: Verificar que no se puede terminar un contrato que ya ha finalizado.  

---

# Caso de Prueba 1: Terminación de contrato

## 1. ID del Caso  
CP-TER-401  

## 2. Nombre de la Prueba  
Validar que el sistema permite cambiar el estado de un contrato a "Terminado".

## 3. Módulo / Funcionalidad  
Gestión de Terminaciones / Actualización  

## 4. Descripción  
Este caso de prueba tiene como finalidad verificar que el sistema permita finalizar un contrato activo, cambiando su estado a "Terminado".

## 5. Precondiciones  

1. El usuario debe estar registrado en el sistema.  
2. El usuario debe estar autenticado.  
3. Debe existir un contrato activo.  
4. El contrato no debe estar previamente terminado.  

## 6. Pasos para Ejecutar la Prueba  

1. El usuario inicia sesión.  
2. Accede al módulo de contratos.  
3. Selecciona un contrato activo.  
4. Ejecuta la opción de terminar contrato.  
5. Confirma la acción.  

## 7. Datos de Entrada  

- ID del contrato: 1  
- Estado actual: Activo  

## 8. Resultado Esperado  

El estado del contrato cambia a "Terminado" en la base de datos.

## 9. Resultado Real  

*(Se completará durante la ejecución de la prueba)*  

## 10. Estado  

- ( ) Pasa  
- ( ) Falla  

---

# Caso de Prueba 2: Registro de fecha y motivo de terminación

## 1. ID del Caso  
CP-TER-402  

## 2. Nombre de la Prueba  
Verificar que se registra correctamente la fecha y el motivo de la terminación.

## 3. Módulo / Funcionalidad  
Gestión de Terminaciones / Registro  

## 4. Descripción  
Este caso de prueba valida que al terminar un contrato, el sistema almacene correctamente la fecha de terminación y el motivo asociado.

## 5. Precondiciones  

1. El usuario debe estar autenticado.  
2. Debe existir un contrato activo.  

## 6. Pasos para Ejecutar la Prueba  

1. El usuario inicia sesión.  
2. Accede al módulo de contratos.  
3. Selecciona un contrato activo.  
4. Ingresa la información de terminación.  
5. Confirma la operación.  

## 7. Datos de Entrada  

- Fecha de terminación: 25/03/2026  
- Motivo: Finalización de proyecto  

## 8. Resultado Esperado  

1. Se registra la fecha de terminación en el contrato.  
2. Se guarda el motivo de la terminación.  
3. El contrato queda en estado "Terminado".  

## 9. Resultado Real  

*(Se completará durante la ejecución de la prueba)*  

## 10. Estado  

- ( ) Pasa  
- ( ) Falla  

---

# Caso de Prueba 3: Rechazo de terminación en contrato ya finalizado

## 1. ID del Caso  
CP-TER-403  

## 2. Nombre de la Prueba  
Comprobar que el sistema no permite terminar un contrato que ya ha finalizado.

## 3. Módulo / Funcionalidad  
Gestión de Terminaciones / Validaciones  

## 4. Descripción  
Este caso de prueba verifica que el sistema rechace la terminación de contratos cuyo estado ya sea "Finalizado" o "Terminado".

## 5. Precondiciones  

1. El usuario debe estar autenticado.  
2. Debe existir un contrato con estado "Finalizado" o "Terminado".  

## 6. Pasos para Ejecutar la Prueba  

1. El usuario inicia sesión.  
2. Accede al módulo de contratos.  
3. Selecciona un contrato ya finalizado.  
4. Intenta ejecutar la opción de terminar contrato.  

## 7. Datos de Entrada  

- ID del contrato: 5  
- Estado del contrato: Finalizado  

## 8. Resultado Esperado  

1. El sistema rechaza la operación.  
2. Se muestra un mensaje indicando que el contrato ya está finalizado.  
3. No se realizan cambios en la base de datos.  

## 9. Resultado Real  

*(Se completará durante la ejecución de la prueba)*  

## 10. Estado  

- ( ) Pasa  
- ( ) Falla  