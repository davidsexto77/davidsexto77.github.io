<?php
$v = isset($_COOKIE['v']) ? $_COOKIE['v'] : 0;
if (isset($_POST['c'])) {
    $v++;
    setcookie('v', $v, time() + 86400);
    header("Location: a6.php");
    exit;
}
?>
<form method="post">
    <button type="submit" name="c">Contar visitas</button>
</form>
<p>Visitas: <?php echo $v; ?></p>