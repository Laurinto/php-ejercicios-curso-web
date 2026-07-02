<?php
session_start();

$usuario = $_SESSION['nombre'];
$rol = $_SESSION['rol'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <p><?= $usuario ?></p>
        <p><?= $rol ?></p>
    </main>
    <?php include_once "footer.php" ?>
</body>
</html>

<!--
Muestra los datos completos del usuario de la sesión.
-->