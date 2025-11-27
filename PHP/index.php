<?php
// Buscar archivos tipo a1.php, a2.php...
$archivos = glob("a*.php"); 

// Ordenar por número (a1, a2, a3...)
usort($archivos, function($a, $b) {
    return intval(substr($a, 1)) - intval(substr($b, 1));
});
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de actividades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f5f5f5;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style: none;
            padding-left: 0;
        }
        li {
            background: white;
            padding: 10px 15px;
            margin: 8px 0;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        a {
            text-decoration: none;
            color: #0077cc;
            font-weight: bold;
        }
    </style>
</head>
<body>

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

</body>
</html>