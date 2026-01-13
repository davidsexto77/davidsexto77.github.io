//ejercicio que crea tikets: 

<?php 
    $total_compra = 70;
    $descuento= 10;
    $compra_descontada = $total_compra - $descuento;

    if ($total_compra >= 50) {
        echo "El valor total de la compra con descuento es: " . $compra_descontada;

    }else {
        echo "NO tienes decuento, el valor de tu compra es: " . $total_compra;
    }
?>