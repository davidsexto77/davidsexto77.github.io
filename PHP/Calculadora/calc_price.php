<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de precios - PHP</title>
    <link rel="icon" type="image/png" href="imagenes/icono.png">
</head>
<body>
    <h1>Calculadora de Precio Unitario</h1>
    <hr>
    <form action="" method="post">
        <div>
                ¿Qué deseas hacer?:
                <input type="radio" name="genero" id="hombre" value="hombre" >
                <label for="hombre">Hombre</label>

                <input type="radio" name="genero" id="mujer" value="mujer">
                <label for="mujer">Mujer</label>
        </div>  



        <button type="submit" name="proced">Calcular Precio Unitario</button>
    </form>
    <?php 
    switch ($proced) {
    case "valor1":
        // Código si $variable == "valor1"
        break;

    case "valor2":
        // Código si $variable == "valor2"
        break;

}


    ?>


    <form action="" method="post">

        <!-- pedir datos -->
        
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
        <div>
            <label for="precio_total">Precio Total:</label><br>
            <input type="number" name="precio_total" id="precio_total" step="0.01" required>
        </div>

        <br>
        <div>
            <label for="precio_total">Precio Total:</label><br>
            <input type="number" name="precio_total" id="precio_total" step="0.01" required>
        </div>

        <br>


        <!-- envio de datos -->
        <button type="submit" name="calcular">Calcular Precio Unitario</button>
        
    </form>
    <!-- version 0.0.1 (php not ready)-->
</body>
</html>