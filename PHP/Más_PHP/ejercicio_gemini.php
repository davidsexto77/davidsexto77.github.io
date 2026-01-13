//ejercicio que comprueba la nota: 

<?php 
    $nota = 10;
    if($nota == 10){
        echo "ENHORABUENA ESTÁS SOBRESALIENTE";
    }elseif ($nota >= 5) {
        echo "Estás aprobado";
    }else {
        echo "Has suspendido :(";
    }
    
?>