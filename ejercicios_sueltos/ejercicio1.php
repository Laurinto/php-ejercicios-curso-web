<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página PHP</title>
</head>
<body>

<?php
$nombre = "Laura";
$hora = date("H"); // 0-23
$hora_completa = date("H:i");
$dia = date("d/m/Y");

if ($hora < 12){
    $saludo = "Buenos días";
} elseif ($hora <20){
    $saludo = "Buenas tardes";
} else{
    $saludo = "Buenas noches";
}
?>

<p><?= $saludo ?>, <?= $nombre ?></p>
<p>Son las <?= $hora_completa ?> horas.</p>
<p>Estamos a día <?= $dia ?>.</p>

</body>
</html>