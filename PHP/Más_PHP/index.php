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
    <link rel="icon" type="image/png" href="https://davidsexto77.github.io/imagenes/icono.png">
    <title>Listado de Actividades - Cyber-Pop</title>
    <style>
        /* --- 1. CONFIGURACIÓN Y VARIABLES --- */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');

        :root {
            --bg-dark: #050505;
            --bg-glow: #1a0b2e;
            --neon-pink: #ff00cc;
            --neon-blue: #3333ff;
            --btn-bg: #16121a;
            --text-white: #ffffff;
            --text-gray: #a9b2c3;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* --- 2. ESTRUCTURA GLOBAL Y FONDO ANIMADO --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            background: radial-gradient(circle at center 15%, var(--bg-glow) 0%, var(--bg-dark) 75%);
            background-attachment: fixed;
            color: var(--text-white);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            overflow-x: hidden;
            position: relative;
        }

        /* Capa de auroras animadas */
        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: -1;
            pointer-events: none;
            opacity: 0.3;
            background: 
                radial-gradient(circle at 20% 30%, var(--neon-pink), transparent 50%),
                radial-gradient(circle at 80% 70%, var(--neon-blue), transparent 50%);
            animation: fondoVivo 15s ease-in-out infinite alternate;
            filter: blur(40px);
        }

        /* --- 3. CABECERA Y EFECTO GLITCH --- */
        header {
            text-align: center;
            padding: 60px 20px 20px;
            width: 100%;
        }

        header h1 {
            font-size: clamp(2.2rem, 8vw, 3.5rem);
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: -2px;
            background: linear-gradient(to right, #8a2be2, #4169e1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            filter: drop-shadow(0 0 12px rgba(138, 43, 226, 0.8));
            cursor: default;
        }

        header h1:hover {
            animation: glitch 0.3s cubic-bezier(.25, .46, .45, .94) both infinite;
        }

        /* --- 4. CONTENEDOR DE LISTADO --- */
        .listado-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        h2 {
            font-size: 0.95rem;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--text-gray);
            margin: 20px 0 35px;
            text-align: center;
        }

        h2::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: linear-gradient(to right, var(--neon-pink), var(--neon-blue));
            margin: 12px auto 0;
            border-radius: 10px;
        }

        ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            width: 100%;
            margin-bottom: 40px;
        }

        /* --- 5. BOTONES ESTILO NEÓN --- */
        .btn-outline {
            display: block;
            padding: 1.1rem;
            text-decoration: none;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
            text-align: center;
            border-radius: 14px;
            transition: var(--transition);
            
            /* Efecto de borde degradado */
            background: var(--btn-bg);
            border: 2px solid transparent;
            background-repeat: no-repeat;
            background-origin: border-box;
            background-clip: padding-box, border-box;
            background-image: 
                linear-gradient(var(--btn-bg), var(--btn-bg)), 
                linear-gradient(to right, var(--neon-pink), var(--neon-blue));
        }

        .btn-outline:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 5px 20px rgba(255, 0, 204, 0.3);
            filter: brightness(1.2);
        }

        /* --- 6. FOOTER Y BOTONES DE ACCIÓN --- */
        footer {
            width: 100%;
            max-width: 500px;
            padding: 40px 20px;
            text-align: center;
            margin-top: auto;
        }

        .btn-danger {
            display: inline-block;
            color: var(--neon-pink);
            text-decoration: none;
            font-weight: 800;
            font-size: 0.8rem;
            letter-spacing: 1px;
            border: 1px solid var(--neon-pink);
            padding: 10px 25px;
            border-radius: 8px;
            text-transform: uppercase;
            transition: var(--transition);
            margin-top: 10px;
        }

        .btn-danger:hover {
            background: var(--neon-pink);
            color: white !important;
            box-shadow: 0 0 20px var(--neon-pink);
        }

        footer p { color: var(--text-gray); font-size: 0.9rem; margin-bottom: 5px; }

        /* --- 7. ANIMACIONES --- */
        @keyframes fondoVivo {
            0% { background-position: 0% 0%; transform: scale(1); }
            100% { background-position: 100% 100%; transform: scale(1.1); }
        }

        @keyframes glitch {
            0% { transform: translate(0); text-shadow: -2px 2px var(--neon-pink), 2px -2px var(--neon-blue); }
            25% { transform: translate(-2px, 2px); }
            50% { transform: translate(2px, -2px); text-shadow: 2px -2px var(--neon-pink), -2px 2px var(--neon-blue); }
            75% { transform: translate(-2px, -2px); }
            100% { transform: translate(0); }
        }

        /* Responsividad móvil */
        @media (max-width: 450px) {
            header h1 { font-size: 1.8rem; }
            .btn-outline { padding: 0.9rem; font-size: 0.75rem; }
        }
    </style>
</head>
<body>

<header>
    <h1>Listado de Actividades</h1>
</header>

<div class="listado-container">
    <h2>Archivos y Carpetas</h2>
    <ul>
        <?php foreach ($elementos as $elemento): ?>
            <?php 
                $es_carpeta = is_dir($elemento);
                $icono = $es_carpeta ? "📁 " : "📄 ";
                $nombre_final = $es_carpeta ? $elemento . "/" : $elemento;
            ?>
            <li>
                <a href="<?= $elemento ?>" class="btn-outline">
                    <?= $icono . $nombre_final ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    
    <a href="../" class="btn-outline" style="opacity: 0.7; margin-top: 20px;">
        Volver a la Página Principal
    </a>
</div>

<footer>
    <p>¿Problemas?</p>
    <a href="mailto:dsexgar0311@g.educaand.es" class="btn-danger">Reportar un problema</a>
    <p style="margin-top: 25px; opacity: 0.5; font-size: 0.75rem; letter-spacing: 2px;">
        DAVID SEXTO - 2026 &copy;
    </p>
</footer>

</body>
</html>