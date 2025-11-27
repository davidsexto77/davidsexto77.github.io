<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar hora local con PHP</title>
</head>
<body>
    <h1>Hora local actual</h1>
    <p> La fecha y hora actual es:</p>
    <p>
        <?php
            date_default_timezone_set('Europe/Madrid');
            echo date('H:i:s');
        ?>
    </p>
</body>
</html>