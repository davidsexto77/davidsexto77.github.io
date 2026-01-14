<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de precios - PHP</title>
    <link rel="icon" type="image/png" href="imagenes/icono.png">
</head>
<body>
    <h1>Calculadora de Gestión</h1>
    <hr>
    
    <form action="" method="post">
        <div>
            <strong>¿Qué deseas hacer?:</strong><br>
            <input type="radio" name="opcion" id="pm" value="pm" required>
            <label for="pm">Calcular Punto Muerto</label>

            <input type="radio" name="opcion" id="dato_falta" value="dato_falta">
            <label for="dato_falta">Cálculo Dato Faltante</label>
        </div>  

        <br>
        <button type="submit" name="enviar">Continuar</button>
    </form>

    <?php 
    // 1. Verificamos si se ha pulsado el botón de enviar
    if (isset($_POST['enviar'])) {
        $proced = $_POST['opcion'];

        // 3. Ejecutamos la lógica según la elección
        switch ($proced) {
            case "pm":
                echo "<h3>Cálculo de Punto Muerto</h3>";

    // PASO 2: ¿Ya recibimos los números del segundo formulario?
    if (isset($_POST['precio_total'], $_POST['coste_variable'], $_POST['coste_fijo'])) {
        
        $p = (float)$_POST['precio_total'];
        $cv = (float)$_POST['coste_variable'];
        $cf = (float)$_POST['coste_fijo'];

        // Validación matemática: Evitar división por cero
        if ($p > $cv) {
            $resultado = $cf / ($p - $cv); // LA FÓRMULA: Q = CF / (P - CV)
            
            echo "<div style='background:#d4edda; padding:15px; border-radius:5px;'>";
            echo "<strong>Resultado:</strong> El punto muerto es de <b>" . number_format($resultado, 2) . "</b> unidades.";
            echo "</div>";
            echo "<br><a href=''>Reiniciar calculadora</a>";
        } else {
            echo "<p style='color:red;'>Error: El precio debe ser mayor al coste variable para cubrir costes.</p>";
            echo "<a href='javascript:history.back()'>Volver a intentarlo</a>";
        }

    } else {
        // PASO 1: Si NO hay números, mostramos el formulario para pedirlos
        // Usamos comillas simples en el HTML para evitar errores de sintaxis en el echo
        echo "
        <form action='' method='post'>
            <input type='hidden' name='opcion' value='pm'>
            <input type='hidden' name='enviar' value='1'>

            <div>
                <label>Precio de Venta (P):</label><br>
                <input type='number' name='precio_total' step='0.01' required>
            </div><br>

            <div>
                <label>Coste Variable Unitario (CV):</label><br>
                <input type='number' name='coste_variable' step='0.01' required>
            </div><br>

            <div>
                <label>Coste Fijo Total (CF):</label><br>
                <input type='number' name='coste_fijo' step='0.01' required>
            </div><br>

            <button type='submit'>Calcular Ahora</button>
        </form>";
    }
    break;

            case "dato_falta":
                echo "<h3>Has elegido calcular un dato faltante</h3>";
                // Aquí iría tu lógica para despejar variables
                break;
            
            default:
                echo "Por favor, selecciona una opción válida.";
                break;
        }
    }
    ?>
        <!-- envio de datos -->
        <button type="submit" name="calcular">Calcular Precio Unitario</button>
        
    </form>
    <!-- version 0.0.2 (php not ready)-->
</body>
</html>