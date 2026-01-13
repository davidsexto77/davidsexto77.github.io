<?php 
//ejercicio para gestión de gym:


/* Instrucciones:

Crea dos variables:

$meses: el número de meses que se apunta (ej: 3).

$precioMensual: lo que cuesta un mes (ej: 25).

Cálculo:

Crea una variable $total que sea la multiplicación de meses por precio mensual.

Lógica:

Si el $total es mayor a 60€, suma una "Cuota de Inscripción" de 5€ al total y muestra: "Total con inscripción: [resultado]€".

Si es 60€ o menos, el cliente tiene la inscripción gratis. Muestra: "Inscripción gratuita. Total: [total]€".*/

$meses = 3;
$precio_mensual = 19.99;

$total = $meses * $precio_mensual;

if ($total > 60) {
    $total +=5;
    echo "Tu cuota de inscripción sube a: " . $total ;
}else {
    echo "Tienes la inscipción gratuita, tu valor de cuota total es: " . $total ; 
}



?>