<?php
require_once __DIR__ . '/../config/env.php';

$titulo_pagina = $titulo_pagina ?? 'ARCADIA - Tu espacio de tecnología';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo_pagina) ?></title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<header>
    <h1><?= htmlspecialchars($nombre_sitio) ?></h1>
    <p>Tu espacio de juegos, programas y tecnología</p>
</header>
