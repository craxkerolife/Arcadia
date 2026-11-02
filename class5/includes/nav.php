<?php
$secciones = [
    'juegos' => '🎮 JUEGOS',
    'emuladores' => '🕹️ EMULADORES',
    'simuladores' => '🧮 SIMULADORES',
    'aplicaciones' => '💻 APLICACIONES',
    'curso' => '📚 CURSO HTML',
    'blog' => '📰 BLOG',
    'busqueda' => '🔎 BÚSQUEDA',
    'sugerencias' => '💡 OPINIONES',
    'comunidad' => '👥 COMUNIDAD',
    'contacto' => '📩 CONTACTO'
];
?>
<nav>
    <?php foreach ($secciones as $id => $nombre): ?>
        <a href="index.php?seccion=<?= urlencode($id) ?>#<?= $id ?>"
           class="<?= ($seccion_activa === $id) ? 'active' : '' ?>">
            <?= $nombre ?>
        </a>
    <?php endforeach; ?>
</nav>
