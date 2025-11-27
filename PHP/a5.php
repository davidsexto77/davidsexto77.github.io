<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
$asignaturas = ["Matemáticas", "Lengua", "Historia", "Biología", "Física"];

echo "Primera asignatura: " . $asignaturas[0] . "<br>";
echo "Última asignatura: " . $asignaturas[count($asignaturas) - 1] . "<br><br>";

echo "Todas las asignaturas:<br>";
foreach ($asignaturas as $asignatura) {
    echo $asignatura . "<br>";
}
?>
</body>