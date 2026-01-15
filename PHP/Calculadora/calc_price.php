<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de precios - PHP</title>
    <link rel="icon" type="image/png" href="https://davidsexto77.github.io/imagenes/icono.png">
    <style>
        /* -------------------------------------------------------------------
           1. VARIABLES Y CONFIGURACIÓN BASE
           ------------------------------------------------------------------- */
        :root {
            --color-fondo: #1f2833;
            --color-oscuro: #0b0c10;
            --color-texto: #c5c6c7;
            --color-acento: #66fcf1;
            --color-acento-hover: #45a29e;
            --color-error: #ff4d4d;
            --color-exito: #28a745;
            --font-stack: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            --glow: 0 0 15px rgba(102, 252, 241, 0.4);
            --ancho-fijo: 320px; 
        }

        * { box-sizing: border-box; }

        body {
            background-color: var(--color-fondo);
            color: var(--color-texto);
            font-family: var(--font-stack);
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
        }

        /* -------------------------------------------------------------------
           2. ESTRUCTURA (HEADER Y CONTENEDOR)
           ------------------------------------------------------------------- */
        header {
            background-color: var(--color-oscuro);
            width: 100%;
            padding: 30px 0;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.7);
            border-bottom: 1px solid rgba(102, 252, 241, 0.2);
            margin-bottom: 40px;
        }

        h1 {
            color: var(--color-acento);
            text-transform: uppercase;
            letter-spacing: 4px;
            margin: 0;
            font-size: 1.8rem;
            text-shadow: var(--glow);
        }

        main.container {
            flex: 1;
            width: 100%;
            max-width: 600px;
            padding: 20px;
            text-align: center;
        }

        .card {
            background-color: var(--color-oscuro);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid rgba(102, 252, 241, 0.1);
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            margin-bottom: 30px;
        }

        h3 { color: var(--color-acento); margin-top: 0; }

        /* -------------------------------------------------------------------
           3. FORMULARIOS E INPUTS
           ------------------------------------------------------------------- */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #fff;
        }

        input[type="number"] {
            width: 100%;
            max-width: var(--ancho-fijo);
            padding: 12px;
            background: #151b24;
            border: 1px solid #45a29e;
            border-radius: 6px;
            color: white;
            font-size: 1rem;
            margin-bottom: 20px;
            outline: none;
            transition: 0.3s;
        }

        input[type="number"]:focus {
            border-color: var(--color-acento);
            box-shadow: 0 0 8px rgba(102, 252, 241, 0.3);
        }

        /* Radio Buttons Estilizados */
        .radio-group {
            text-align: left;
            display: inline-block;
            margin-bottom: 25px;
        }

        .radio-option {
            margin: 10px 0;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        /* -------------------------------------------------------------------
           4. BOTONES Y RESULTADOS
           ------------------------------------------------------------------- */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: var(--ancho-fijo);
            height: 50px;
            border-radius: 8px;
            font-weight: 700;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            margin: 10px 0;
        }

        .btn-primary {
            background-color: var(--color-acento);
            color: var(--color-oscuro);
        }

        .btn-primary:hover {
            background-color: var(--color-acento-hover);
            transform: translateY(-2px);
            box-shadow: var(--glow);
        }

        .resultado-box {
            background: rgba(40, 167, 69, 0.15);
            border: 1px solid var(--color-exito);
            color: #d4edda;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .enlace-volver {
            color: var(--color-acento);
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-block;
            margin-top: 15px;
        }

        .enlace-volver:hover { text-decoration: underline; }

        /* -------------------------------------------------------------------
           5. FOOTER
           ------------------------------------------------------------------- */
        footer {
            width: 100%;
            background-color: var(--color-oscuro);
            padding: 30px 20px;
            border-top: 1px solid rgba(102, 252, 241, 0.2);
            text-align: center;
            margin-top: 40px;
        }

        footer a { color: var(--color-acento); text-decoration: none; font-weight: bold; }

        /* Animación */
        .fade-in { animation: fadeIn 0.5s ease-out forwards; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <header>
        <h1>Calculadora de Gestión</h1>
    </header>

    <main class="container fade-in">
        
        <?php if (!isset($_POST['enviar'])): ?>
        <div class="card">
            <h3>¿Qué deseas calcular?</h3>
            <form action="" method="post">
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" name="opcion" id="pm" value="pm" required>
                        <label for="pm" style="margin-bottom:0; margin-left:10px;">Calcular Punto Muerto</label>
                    </div>

                    <div class="radio-option">
                        <input type="radio" name="opcion" id="dato_falta" value="dato_falta">
                        <label for="dato_falta" style="margin-bottom:0; margin-left:10px;">Cálculo Dato Faltante</label>
                    </div>
                </div>  
                <br>
                <button type="submit" name="enviar" class="btn btn-primary">Continuar</button>
            </form>
        </div>
        <?php endif; ?>

        <?php 
        if (isset($_POST['enviar'])) {
            $proced = $_POST['opcion'];

            echo "<div class='card fade-in'>";
            
            switch ($proced) {
                case "pm":
                    echo "<h3>Punto Muerto</h3>";

                    if (isset($_POST['precio_total'], $_POST['coste_variable'], $_POST['coste_fijo'])) {
                        $p = (float)$_POST['precio_total'];
                        $cv = (float)$_POST['coste_variable'];
                        $cf = (float)$_POST['coste_fijo'];

                        if ($p > $cv) {
                            $resultado = $cf / ($p - $cv);
                            echo "<div class='resultado-box'>";
                            echo "<strong>Resultado:</strong> El punto muerto es de <b>" . number_format($resultado, 2) . "</b> unidades.";
                            echo "</div>";
                            echo "<a href='' class='enlace-volver'>Reiniciar calculadora</a>";
                        } else {
                            echo "<p style='color:var(--color-error);'>Error: El precio debe ser mayor al coste variable.</p>";
                            echo "<a href='javascript:history.back()' class='enlace-volver'>Volver a intentarlo</a>";
                        }
                    } else {
                        echo "
                        <form action='' method='post'>
                            <input type='hidden' name='opcion' value='pm'>
                            <input type='hidden' name='enviar' value='1'>

                            <label>Precio de Venta (P):</label>
                            <input type='number' name='precio_total' step='0.01' required placeholder='Ej: 50.00'>

                            <label>Coste Variable Unitario (CV):</label>
                            <input type='number' name='coste_variable' step='0.01' required placeholder='Ej: 20.00'>

                            <label>Coste Fijo Total (CF):</label>
                            <input type='number' name='coste_fijo' step='0.01' required placeholder='Ej: 1000.00'>

                            <button type='submit' class='btn btn-primary'>Calcular Ahora</button>
                        </form>
                        <br><a href='' class='enlace-volver'>Volver al inicio</a>";
                    }
                    break;

                case "dato_falta":
                    echo "<h3>Calcular Precio Necesario</h3>";
                    
                    if (isset($_POST['cantidad_q'], $_POST['c_variable'], $_POST['c_fijo'])) {
                        $Q = (float)$_POST['cantidad_q'];
                        $CV = (float)$_POST['c_variable'];
                        $CF = (float)$_POST['c_fijo'];

                        if ($Q > 0) {
                            $precio_necesario = ($CF / $Q) + $CV;
                            echo "<div class='resultado-box' style='background: rgba(255, 193, 7, 0.1); border-color: #ffc107; color: #ffeeba;'>";
                            echo "<strong>Precio Mínimo:</strong> Para cubrir costes con " . $Q . " unidades, debes vender a: ";
                            echo "<b>" . number_format($precio_necesario, 2) . " €</b>";
                            echo "</div>";
                            echo "<a href='' class='enlace-volver'>Hacer otro cálculo</a>";
                        } else {
                            echo "<p style='color:var(--color-error);'>Error: Las unidades deben ser mayores a cero.</p>";
                            echo "<a href='javascript:history.back()' class='enlace-volver'>Volver</a>";
                        }
                    } else {
                        echo "
                        <form action='' method='post'>
                            <input type='hidden' name='opcion' value='dato_falta'>
                            <input type='hidden' name='enviar' value='1'>

                            <label>Unidades a vender (Q):</label>
                            <input type='number' name='cantidad_q' step='0.01' required>

                            <label>Coste Variable Unitario (CV):</label>
                            <input type='number' name='c_variable' step='0.01' required>

                            <label>Coste Fijo Total (CF):</label>
                            <input type='number' name='c_fijo' step='0.01' required>

                            <button type='submit' class='btn btn-primary'>Calcular Precio Mínimo</button>
                        </form>
                        <br><a href='' class='enlace-volver'>Volver al inicio</a>";
                    }
                    break;
            }
            echo "</div>"; // Cierre de .card
        }
        ?>

    </main>

    <footer>
        <a href="https://davidsexto77.github.io/" class="btn btn-primary" style="width: 250px; height: 40px; font-size: 0.75rem;">
            Volver a la Página Principal
        </a>
        <p style="margin: 15px 0 5px;">
            ¿Problemas? 
            <a href="mailto:dsexgar0311@g.educaand.es">Reportar un problema</a>
        </p>
        <p style="margin-top: 5px; opacity: 0.5; font-size: 0.8rem;">DAVID SEXTO - 2026 &copy; </p>
    </footer>

</body>
</html>