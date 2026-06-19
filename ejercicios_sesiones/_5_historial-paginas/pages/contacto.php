<?php
session_start();

$pagina_actual = 'Contacto';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
</head>
<body>
    <h1>Contacto</h1>
    <p>Número: <a href="tel:">111 111 111</a></p>
    <p>Correo: <a href="mailto:">micorreo@correo.com</a></p>
    <?php include_once '../components/historial.php' ?>
    <?php include_once '../components/footer.php' ?>
</body>
</html>