<?php
// 1. Obtenemos tanto archivos como carpetas
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
    <!-- Subimos un nivel (../) para entrar en la carpeta imagenes -->
    <link rel="icon" type="image/png" href="../imagenes/icono.png">
    <title>Listado de Actividades - Cyber-Pop</title>
    
    <!-- Subimos un nivel (../) para encontrar el CSS en la raíz -->
    <link rel="stylesheet" href="../styles.css">
    
    <!-- Librería FontAwesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <!-- Lienzo para el efecto Matrix de fondo -->
    <canvas id="matrix-canvas"></canvas>

    <header>
        <h1>Actividades</h1>
    </header>

    <main class="container">
        <h2>Archivos y Carpetas</h2>
        
        <nav>
            <?php 
            $delay = 1; // Contador para la animación en cascada
            foreach ($elementos as $elemento): 
                $es_carpeta = is_dir($elemento);
                
                // Asignamos iconos de FontAwesome dependiendo de si es carpeta o archivo
                $icono = $es_carpeta ? '<i class="fa-solid fa-folder-open"></i>' : '<i class="fa-solid fa-file-code"></i>';
                $nombre_final = $es_carpeta ? $elemento . "/" : $elemento;
            ?>
                <!-- Imprimimos el botón con un delay dinámico para que caigan uno a uno -->
                <a href="<?= $elemento ?>" class="btn btn-outline" style="animation-delay: 0.<?= $delay ?>s;">
                    <?= $icono ?> <?= $nombre_final ?>
                </a>
            <?php 
                $delay++; // Aumentamos el retraso para el siguiente botón
            endforeach; 
            ?>
        </nav>
        
        <!-- Botón de volver subiendo un nivel (../) a la página principal -->
        <a href="../" class="btn btn-outline" style="margin-top: 30px; width: max-content; margin-left: auto; margin-right: auto; animation-delay: 0.<?= $delay ?>s;">
            <i class="fa-solid fa-arrow-left"></i> Volver a la Principal
        </a>
    </main>

    <footer>
        <p>¿Problemas?</p>
        <a href="mailto:dsexgar0311@g.educaand.es" class="btn btn-danger">
            <i class="fa-solid fa-bug"></i> REPORTAR UN PROBLEMA
        </a>
        <p class="copyright">DAVID SEXTO - 2026 &copy;</p>
    </footer>

    <!-- Subimos un nivel (../) para encontrar el JS en la raíz -->
    <script src="../script.js"></script>
</body>
</html>