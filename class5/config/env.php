<?php
// Carga la configuración local desde el archivo .env
$archivo_env = dirname(__DIR__) . '/.env';

if (file_exists($archivo_env)) {
    $lineas = file($archivo_env, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lineas as $linea) {
        $linea = trim($linea);

        if ($linea === '' || str_starts_with($linea, '#')) {
            continue;
        }

        if (strpos($linea, '=') !== false) {
            [$clave, $valor] = explode('=', $linea, 2);
            $_ENV[trim($clave)] = trim($valor);
        }
    }
}

// Valores por defecto si todavía no existe el archivo .env
$nombre_sitio = $_ENV['APP_NAME'] ?? 'ARCADIA';
$email_soporte = $_ENV['APP_EMAIL'] ?? 'arcadia@gmail.com';
$entorno = $_ENV['APP_ENV'] ?? 'local';
?>

// Escapa texto antes de mostrarlo en HTML para prevenir XSS.
function e($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
