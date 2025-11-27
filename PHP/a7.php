<?php
$edad = 20;

if ($edad < 18) {
    echo "No puedes acceder a la página.";
} else {
    if ($edad >= 21) {
        echo "Acceso permitido: acceso total.";
    } else {
        echo "Acceso permitido: acceso limitado.";
    }
}
?>