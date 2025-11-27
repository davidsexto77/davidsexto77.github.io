<?php
$alumnos = [
    "María" => 8.7,
    "Carlos" => 6.3,
    "Lucía" => 9.4,
    "Pedro" => 5.8,
    "Ana"   => 7.9,
    "Jorge" => 10.1
];

$mejorAlumno = "";
$mejorNota = -1;

foreach ($alumnos as $nombre => $nota) {
    if ($nota > $mejorNota) {
        $mejorNota = $nota;
        $mejorAlumno = $nombre;
    }
}

echo "El alumno con la nota más alta es $mejorAlumno con un $mejorNota.";
?>