

<?php
session_start();

$_SESSION['nombre'] = "Laura";

if (isset($_POST['reiniciar'])){ //si existe REINICIAR
    $_SESSION['visitas'] = 0; // resetear a 0 VISITAS
    unset($_SESSION['primera_visita']); // quitar PRIMERA VISITA
}

if (!isset($_SESSION['visitas'])){ // si no existe VISITAS
    $_SESSION['visitas']=0; // resetear a 0 VISITAS
    $_SESSION['primera_visita'] = date("d/m/Y H:i:s"); // poner fecha a PRIMERA VISITA
}


$_SESSION['visitas']++; // suma a VISITAS
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>    
    <h1>Buenas, <?= $_SESSION['nombre'] ?>.</h1>
    <?php if ($_SESSION['visitas'] === 1): ?>
        <p>Bienvenido por primera vez</p>
    <?php else: ?>
        <p>Has visitado esta pagina <?= $_SESSION['visitas'] ?> veces.</p>
    <?php endif; ?>
    <p>Primera visita:<?= $_SESSION['primera_visita'] ?></p>
    <form method="post">
        <button name="reiniciar" type="submit">REINICIAR</button>
    </form>
</body>
</html>
