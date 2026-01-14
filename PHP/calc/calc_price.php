<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de precios - PHP</title>
    <link rel="icon" type="image/png" href="imagenes/icono.png">
</head>
<body>
    <h2>Calculadora de Precio Unitario</h2>

    <form action="" method="post">
        
        <div>
            <label for="precio_total">Precio Total:</label><br>
            <input type="number" name="precio_total" id="precio_total" step="0.01" required>
        </div>

        <br>

        <div>
            <label for="cantidad">Cantidad / Unidades:</label><br>
            <input type="number" name="cantidad" id="cantidad" step="0.01" required>
        </div>

        <br>

        <button type="submit" name="calcular">Calcular Precio Unitario</button>
        
    </form>
    <!-- version 0.0.1 (php not ready)-->
</body>
</html>