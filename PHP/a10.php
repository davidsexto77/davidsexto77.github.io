<?php
$companeros = [
    "Alejandro" => 17,
    "David1"    => 17,
    "Juan"      => 17,
    "David2"    => 17,
    "Jorge"     => 17,
    "Manu"      => 17
];
?>

<table border="1" cellpadding="8">
    <tr>
        <th>Nombre</th>
        <th>Edad</th>
    </tr>

    <?php foreach ($companeros as $nombre => $edad): ?>
        <tr>
            <td><?php echo $nombre; ?></td>
            <td><?php echo $edad; ?></td>
        </tr>
    <?php endforeach; ?>
</table>