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
    <style>
        /* Mantenemos tus estilos originales */
        :root {
            --color-fondo-principal: #1f2833;
            --color-header-footer: #0b0c10;
            --color-texto-principal: #c5c6c7;
            --color-acento: #66fcf1;
            --color-acento-hover: #45a29e;
            --font-stack: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            --color-texto-hover-btn: #0d161a;
        }

        body {
            background-color: var(--color-fondo-principal);
            font-family: var(--font-stack);
            margin: 0;
            padding: 40px 20px;
            line-height: 1.6;
            color: var(--color-texto-principal);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; 
            align-items: center; 
        }

        .listado-container {
            width: 100%;
            max-width: 600px;
            padding: 30px;
            background-color: #1a2027;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            text-align: center;
            margin-bottom: 40px;
        }

        h1 {
            color: var(--color-acento);
            text-shadow: 0 0 8px rgba(102, 252, 241, 0.4); 
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 30px;
            border-bottom: 2px solid var(--color-acento-hover);
            padding-bottom: 10px;
        }

        ul {
            list-style: none;
            padding-left: 0;
            text-align: left;
        }

        li {
            background: var(--color-header-footer);
            padding: 15px 20px;
            margin: 15px 0;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.4);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        li:hover {
            background-color: #1a2027;
            transform: translateX(5px);
        }

        a {
            text-decoration: none;
            color: var(--color-acento);
            font-weight: 600;
            display: block;
            transition: color 0.3s ease;
        }
        
        a:hover {
            color: var(--color-acento-hover);
        }

        .btn-acento {
            display: inline-block; 
            text-decoration: none;
            background-color: var(--color-header-footer); 
            color: var(--color-acento);
            border: 2px solid var(--color-acento);
            padding: 12px 26px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
            margin-top: 30px;
            width: fit-content; 
        }

        .btn-acento:hover {
            background-color: var(--color-acento); 
            color: var(--color-texto-hover-btn);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(102, 252, 241, 0.4); 
        }

        footer {
            width: 100%;
            background-color: var(--color-header-footer);
            text-align: center;
            padding: 15px 0;
            font-size: 0.85em;
            color: #45a29e;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.5);
            margin-top: auto;
        }
        
        footer a {
            color: var(--color-acento-hover); 
            display: inline;
        }
    </style>
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
    <p style="margin-top: 5px;">DAVID SEXTO - 2025 &copy; </p>
</footer>

</body>
</html>