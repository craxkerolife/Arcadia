<?php
require_once 'config/env.php';

// Sección activa recibida por GET. Se valida contra una lista permitida.
$secciones_validas = [
    'juegos', 'emuladores', 'simuladores', 'aplicaciones',
    'curso', 'blog', 'sugerencias', 'comunidad', 'contacto', 'busqueda'
];

$seccion_recibida = filter_input(INPUT_GET, 'seccion', FILTER_UNSAFE_RAW);
$seccion_recibida = trim((string) $seccion_recibida);
$seccion_activa = in_array($seccion_recibida, $secciones_validas, true)
    ? $seccion_recibida
    : 'juegos';

// Procesamiento del formulario POST de contacto/opiniones.
$errores = [];
$mensaje_exito = '';

$nombre = '';
$email = '';
$opinion = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Se leen y limpian todos los campos antes de validarlos o mostrarlos.
    $nombre = trim((string) filter_input(INPUT_POST, 'nombre', FILTER_UNSAFE_RAW));
    $email = trim((string) filter_input(INPUT_POST, 'email', FILTER_UNSAFE_RAW));
    $opinion = trim((string) filter_input(INPUT_POST, 'opinion', FILTER_UNSAFE_RAW));

    if ($nombre === '') {
        $errores[] = 'El nombre es obligatorio.';
    }

    if ($email === '') {
        $errores[] = 'El correo electrónico es obligatorio.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'Ingresá un correo electrónico válido.';
    }

    if ($opinion === '') {
        $errores[] = 'El mensaje no puede estar vacío.';
    }

    if (empty($errores)) {
        $mensaje_exito = '¡Gracias! Tu mensaje fue recibido correctamente.';
        // En esta práctica se confirma el procesamiento; no se guarda en una base de datos.
        $nombre = '';
        $email = '';
        $opinion = '';
    }
}

// Procesamiento del formulario GET de búsqueda.
$busqueda = trim((string) filter_input(INPUT_GET, 'q', FILTER_UNSAFE_RAW));
$resultados = [];

if ($busqueda !== '') {
    $catalogo = [
        'Super Mario' => 'Juego clásico para jugar desde el navegador.',
        'Tetris' => 'Juego de bloques y lógica.',
        'Minecraft Classic' => 'Versión clásica de Minecraft.',
        'PPSSPP' => 'Emulador para juegos de PSP.',
        'RetroArch' => 'Plataforma para utilizar diferentes emuladores.',
        'Desmos' => 'Calculadora científica online.',
        'Visual Studio Code' => 'Editor de código para programar.'
    ];

    foreach ($catalogo as $producto => $descripcion) {
        if (stripos($producto, $busqueda) !== false ||
            stripos($descripcion, $busqueda) !== false) {
            $resultados[$producto] = $descripcion;
        }
    }
}

$titulos = [
    'juegos' => 'Juegos',
    'emuladores' => 'Emuladores',
    'simuladores' => 'Simuladores',
    'aplicaciones' => 'Aplicaciones',
    'curso' => 'Curso HTML',
    'blog' => 'Blog',
    'sugerencias' => 'Sugerencias',
    'comunidad' => 'Comunidad',
    'contacto' => 'Contacto',
    'busqueda' => 'Búsqueda'
];

$titulo_pagina = ($titulos[$seccion_activa] ?? 'Inicio') . ' - ARCADIA';

require_once 'includes/header.php';
require_once 'includes/nav.php';
?>

<main>
    <section id="busqueda">
        <h2>🔎 BÚSQUEDA RÁPIDA (GET)</h2>
        <p>Buscá juegos, emuladores o aplicaciones del sitio.</p>

        <form method="GET" action="index.php#busqueda">
            <input type="hidden" name="seccion" value="busqueda">
            <label for="q">¿Qué querés buscar?</label>
            <input
                type="text"
                id="q"
                name="q"
                value="<?= e($busqueda) ?>"
                placeholder="Ejemplo: Mario, emulador..."
            >
            <button type="submit">Buscar</button>
        </form>

        <?php if ($busqueda !== ''): ?>
            <h3>Resultados para: <?= e($busqueda) ?></h3>

            <?php if (!empty($resultados)): ?>
                <?php foreach ($resultados as $nombre_resultado => $descripcion): ?>
                    <div class="juego">
                        <h3><?= e($nombre_resultado) ?></h3>
                        <p><?= e($descripcion) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No se encontraron resultados. Probá con otra palabra.</p>
            <?php endif; ?>
        <?php endif; ?>
    </section>

    <section id="juegos">
        <h2>🎮 JUEGOS</h2>
        <div class="juego">
            <h3>Super Mario</h3>
            <a class="boton" href="https://supermario-game.com/es" target="_blank" rel="noopener noreferrer">Jugar Super Mario</a>
            <h4>Video de Super Mario Bros</h4>
            <iframe src="https://www.youtube.com/embed/SgqTmKZ4-UA" title="Video de Super Mario Bros" allowfullscreen></iframe>
        </div>
        <div class="juego">
            <h3>Tetris</h3>
            <a class="boton" href="https://tetris.com/play-tetris" target="_blank" rel="noopener noreferrer">Jugar Tetris</a>
            <h4>Video de Tetris</h4>
            <iframe src="https://www.youtube.com/embed/fy5qt_SOapM" title="Video de Tetris" allowfullscreen></iframe>
        </div>
        <div class="juego">
            <h3>Minecraft Classic</h3>
            <a class="boton" href="https://classic.minecraft.net/" target="_blank" rel="noopener noreferrer">Abrir Minecraft Classic</a>
            <h4>Video de Minecraft Classic</h4>
            <iframe src="https://www.youtube.com/embed/LEG9feKeQMY" title="Video de Minecraft Classic" allowfullscreen></iframe>
        </div>
    </section>

    <section id="emuladores">
        <h2>🕹️ EMULADORES</h2>
        <h3>PPSSPP</h3>
        <p>Emulador para jugar juegos de PSP.</p>
        <a class="boton" href="https://www.ppsspp.org/download/" target="_blank" rel="noopener noreferrer">Descargar PPSSPP</a>
        <h3>RetroArch</h3>
        <p>Plataforma para utilizar diferentes emuladores.</p>
        <a class="boton" href="https://www.retroarch.com/" target="_blank" rel="noopener noreferrer">Página Oficial RetroArch</a>
    </section>

    <section id="simuladores">
        <h2>🧮 SIMULADORES</h2>
        <h3>Calculadora Online</h3>
        <p>Simulador básico para operaciones matemáticas.</p>
        <a class="boton" href="https://www.desmos.com/scientific" target="_blank" rel="noopener noreferrer">Abrir Calculadora</a>
        <h3>Piano Virtual</h3>
        <p>Probá un piano directamente desde el navegador.</p>
        <a class="boton" href="https://www.onlinepianist.com/virtual-piano" target="_blank" rel="noopener noreferrer">Abrir Piano Virtual</a>
    </section>

    <section id="aplicaciones">
        <h2>💻 APLICACIONES</h2>
        <h3>Visual Studio Code</h3>
        <p>Editor de código para programar páginas web.</p>
        <a class="boton" href="https://code.visualstudio.com/" target="_blank" rel="noopener noreferrer">Página Oficial VS Code</a>
        <h3>Google Chrome</h3>
        <p>Navegador rápido y sencillo.</p>
        <a class="boton" href="https://www.google.com/chrome/" target="_blank" rel="noopener noreferrer">Página Oficial Chrome</a>
        <h3>Discord</h3>
        <p>Plataforma para comunicarse con otras personas.</p>
        <a class="boton" href="https://discord.com/" target="_blank" rel="noopener noreferrer">Página Oficial Discord</a>
    </section>

    <section id="curso">
        <h2>📚 CURSO HTML</h2>
        <h3>Introducción</h3>
        <p>Aprenderás las bases del desarrollo web.</p>
        <h3>Temas</h3>
        <h4>HTML</h4><p>Estructura básica de una página.</p>
        <h4>Encabezados</h4><p>Uso de h1, h2, h3 y más.</p>
        <h4>Enlaces</h4><p>Conectar páginas y sitios web.</p>
        <h4>Imágenes</h4><p>Insertar fotos y logos.</p>
    </section>

    <section id="blog">
        <h2>📰 BLOG</h2>
        <h3>¿Qué es HTML?</h3><p>Es el lenguaje utilizado para crear páginas web.</p>
        <h3>¿Qué es un navegador?</h3><p>Programa utilizado para entrar a Internet.</p>
        <h3>¿Qué es un emulador?</h3><p>Programa que imita el funcionamiento de una consola.</p>
    </section>

    <section id="sugerencias">
        <h2>💡 FORMULARIO DE OPINIONES (POST)</h2>
        <p>Dejanos tu opinión para ayudar a mejorar ARCADIA.</p>

        <?php if (!empty($mensaje_exito)): ?>
            <p class="mensaje-exito"><?= e($mensaje_exito) ?></p>
        <?php endif; ?>

        <?php if (!empty($errores)): ?>
            <div class="mensaje-error">
                <p>Revisá los siguientes datos:</p>
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?= e($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php#sugerencias">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= e($nombre) ?>" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" value="<?= e($email) ?>" required>

            <label for="opinion">Tu opinión o sugerencia:</label>
            <textarea id="opinion" name="opinion" required><?= e($opinion) ?></textarea>

            <button type="submit">Enviar opinión</button>
        </form>
    </section>

    <section id="comunidad">
        <h2>👥 DEBATE DE LA COMUNIDAD</h2>
        <p><strong>¿Qué contenido te gustaría ver más en Arcadia?</strong></p>
        <label><input type="radio" name="contenido" value="Más juegos retro"> Más juegos retro</label><br>
        <label><input type="radio" name="contenido" value="Más emuladores"> Más emuladores</label><br>
        <label><input type="radio" name="contenido" value="Más programas"> Más programas</label><br>
        <label><input type="radio" name="contenido" value="Más sistemas operativos"> Más sistemas operativos</label>
        <p>¿Por qué elegiste esa opción?</p>
        <textarea id="motivo-comunidad" name="motivo-comunidad"></textarea>
        <br>
        <button id="boton-comunidad" type="button">Participar</button>
    </section>

    <section id="contacto">
        <h2>📩 CONTACTO</h2>
        <p>Email: <?= e($email_soporte) ?></p>
        <p>Instagram: @arcadiaweb</p>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
