<?php
// 1. Cambiamos "*.php" por "*" para obtener tanto archivos como carpetas
$elementos = glob("*"); 

$current_file = basename(__FILE__);

// 2. Filtramos para excluir el propio index y archivos ocultos
$elementos = array_filter($elementos, function($item) use ($current_file) {
    return $item !== $current_file && $item[0] !== '.';
});

// 3. Ordenación natural
natsort($elementos);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagen/png" href="https://davidsexto77.github.io/imagenes/icono.png">
    <title>Listado de actividades</title>
</head>
<body>

<div class="listado-container">
    <h1>Listado de Actividades</h1>
    <ul>
        <?php foreach ($elementos as $elemento): ?>
            <?php 
                // Comprobamos si es una carpeta para añadir un icono visual
                $es_carpeta = is_dir($elemento);
                $icono = $es_carpeta ? "📁 " : "📄 ";
                $nombre_final = $es_carpeta ? $elemento . "/" : $elemento;
            ?>
            <li>
                <a href="<?= $elemento ?>">
                    <?= $icono . $nombre_final ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <a href="https://davidsexto77.github.io/" class="btn-acento" role="button">
        Volver a la Página Principal
    </a>
</div>

<footer>
    <p style="margin-bottom: 5px;">
        ¿Problemas? 
        <a href="mailto:dsexgar0311@g.educaand.es">Reportar un problema</a>
    </p>
    <p style="margin-top: 5px;">DAVID SEXTO - 2026 &copy; </p>
</footer>

</body>
</html>