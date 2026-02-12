# Servicio Web de Autenticación (AA5-EV01)

Este proyecto es un servicio web (API REST) desarrollado en **PHP** que gestiona el inicio de sesión de usuarios.

## Requerimientos cumplidos:
- **Método POST:** Recibe credenciales en formato JSON.
- **Validación:** Compara los datos recibidos con una base de datos simulada.
- **Respuestas:**
  - `200 OK`: "Autenticación satisfactoria".
  - `401 Unauthorized`: "Error en la autenticación".
- **Comentarios:** El código está documentado para facilitar su comprensión.

## Cómo probar el servicio:
1. Servir el archivo `index.php` usando un servidor local (como XAMPP o el servidor interno de PHP).
2. Enviar una petición POST a la URL del servicio con el siguiente cuerpo JSON:
   ```json
   {
     "usuario": "admin",
     "password": "123"
   }