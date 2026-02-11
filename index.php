<?php
/**
 * Servicio Web de Autenticación - Evidencia AA5-EV01
 * Este script maneja el inicio de sesión mediante peticiones POST.
 */

header("Content-Type: application/json");

// Simulación de base de datos para el caso de estudio
$usuarios_registrados = [
    ["user" => "admin", "pass" => "12345"],
    ["user" => "camilo", "pass" => "sena2026"]
];

// Solo permitimos peticiones POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Obtenemos los datos enviados en el cuerpo de la petición (JSON)
    $datos = json_decode(file_get_contents("php://input"), true);

    if (isset($datos['usuario']) && isset($datos['password'])) {
        $usuario_enviado = $datos['usuario'];
        $pass_enviada = $datos['password'];
        $autenticado = false;

        // Verificamos las credenciales
        foreach ($usuarios_registrados as $u) {
            if ($u['user'] === $usuario_enviado && $u['pass'] === $pass_enviada) {
                $autenticado = true;
                break;
            }
        }

        // Respuesta según el resultado de la validación
        if ($autenticado) {
            http_response_code(200);
            echo json_encode(["status" => "success", "message" => "Autenticación satisfactoria"]);
        } else {
            http_response_code(401);
            echo json_encode(["status" => "error", "message" => "Error en la autenticación"]);
        }
    } else {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Datos incompletos"]);
    }
} else {
    http_response_code(405);
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
?>