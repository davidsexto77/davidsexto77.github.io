<?php 
    //ejercicio que calcula el precio de juegos
    $cant_juegos = 4;
    $precio_juego = 30;
    $descuento = 10;

    $subtotal = $precio_juego * $cant_juegos;

    if ($cant_juegos > 3) {
        $precio_final = $subtotal - $descuento;
        echo "Se te aplicará el descuento pertinente: ". $precio_final;
    }else {
        echo "No te podemos aplicar el descuento, el precio es: ". $subtotal;
    }
?>