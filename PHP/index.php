<?php
// Buscar archivos tipo a1.php, a2.php...
$archivos = glob("a*.php"); 

// Ordenar por número (a1, a2, a3...)
usort($archivos, function($a, $b) {
    // Extrae el número después de 'a' para la ordenación
    return intval(substr($a, 1)) - intval(substr($b, 1));
});
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de actividades</title>
    <style>
        /* -------------------------------------------------------------------
           VARIABLES CSS (Copiadas del proyecto anterior)
           ------------------------------------------------------------------- */
        :root {
            --color-fondo-principal: #1f2833; /* Gris muy oscuro / Azul pizarra */
            --color-header-footer: #0b0c10; /* Negro profundo */
            --color-texto-principal: #c5c6c7; /* Gris claro para texto */
            --color-acento: #66fcf1; /* Azul/Cian vibrante para acentos e interacción */
            --color-acento-hover: #45a29e; /* Tono más oscuro para el hover */
            --font-stack: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Fuente moderna */
            --color-texto-hover-btn: #0d161a; /* Gris muy oscuro para el hover del botón */
        }

        /* -------------------------------------------------------------------
           ESTILOS GENERALES Y ESTRUCTURA
           ------------------------------------------------------------------- */
        body {
            background-color: var(--color-fondo-principal);
            font-family: var(--font-stack);
            margin: 0;
            padding: 40px 20px;
            line-height: 1.6;
            color: var(--color-texto-principal);
            min-height: 100vh;
            display: flex;
            justify-content: center; /* Centra horizontalmente */
            align-items: flex-start; /* Alinea arriba */
        }

        /* Contenedor principal para simular la tarjeta de sección */
        .listado-container {
            width: 100%;
            max-width: 600px;
            padding: 30px;
            background-color: #1a2027; /* Fondo ligeramente diferente al body */
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            text-align: center; /* Centra el botón al final */
        }

        /* -------------------------------------------------------------------
           TIPOGRAFÍA
           ------------------------------------------------------------------- */
        h1 {
            color: var(--color-acento);
            text-shadow: 0 0 8px rgba(102, 252, 241, 0.4); 
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 30px;
            border-bottom: 2px solid var(--color-acento-hover);
            padding-bottom: 10px;
        }

        /* -------------------------------------------------------------------
           LISTA Y ENLACES
           ------------------------------------------------------------------- */
        ul {
            list-style: none;
            padding-left: 0;
            text-align: left; /* Asegura que la lista se alinee a la izquierda */
        }

        li {
            background: var(--color-header-footer); /* Negro profundo para los ítems */
            padding: 15px 20px;
            margin: 15px 0;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.4);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        li:hover {
            background-color: #1a2027; /* Fondo un poco más claro al pasar el ratón */
            transform: translateX(5px); /* Pequeño desplazamiento para efecto */
        }

        a {
            text-decoration: none;
            color: var(--color-acento); /* Color cian */
            font-weight: 600;
            display: block; /* Hace que el enlace ocupe todo el <li> */
            transition: color 0.3s ease;
        }
        
        a:hover {
            color: var(--color-acento-hover);
        }

        /* -------------------------------------------------------------------
           BOTÓN PRINCIPAL (Volver a la Página Principal)
           ------------------------------------------------------------------- */
        .btn-acento {
            display: inline-block; 
            text-decoration: none;
            
            background-color: var(--color-header-footer); 
            color: var(--color-acento);                   /* Texto Cian */
            border: 2px solid var(--color-acento);        

            padding: 12px 26px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease; 

            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
            margin-top: 30px;
            /* Asegura que el botón no se estire y se centre dentro de .listado-container */
            width: fit-content; 
        }

        .btn-acento:hover {
            background-color: var(--color-acento);       
            color: var(--color-texto-hover-btn);         
            
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(102, 252, 241, 0.4); 
        }

        .btn-acento:active {
            transform: translateY(1px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.25);
        }
    </style>
</head>
<body>

<div class="listado-container">
    <h1>Listado de Actividades</h1>
    <ul>
        <?php foreach ($archivos as $archivo): ?>
            <?php
                // Sacamos solo el número: "a3.php" → 3
                $num = intval(substr($archivo, 1));
            ?>
            <li><a href="<?= $archivo ?>">Actividad <?= $num ?></a></li>
        <?php endforeach; ?>
    </ul>
    
    <!-- Botón de regreso añadido aquí -->
    <a href="https://davidsexto77.github.io/" class="btn-acento" role="button">
        Volver a la Página Principal
    </a>
</div>
    <footer>
            <p>DAVID SEXTO - 2025 &copy; </p>
    </footer>
</body>
</html>