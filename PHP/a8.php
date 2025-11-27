<?php
$nota = 8.4;          // Nota original
$comportamiento = 1;  // Valor entre 0 y 2

// Restamos comportamiento
$notaFinal = $nota - $comportamiento;

// Clasificación según la nota final
if ($notaFinal < 5) {
    $calificacion = "Suspenso";
} elseif ($notaFinal < 7) {
    $calificacion = "Aprobado";
} elseif ($notaFinal < 9) {
    $calificacion = "Notable";
} else {
    $calificacion = "Sobresaliente";
}

echo "Calificación: $calificacion ($notaFinal)";
?>