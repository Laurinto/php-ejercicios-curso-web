<?php
session_start();

$pagina_actual = 'Inicio';


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Esto es el inicio</h1>
    <h2>Secciones</h2>
    <nav>
        <p>Contacto</p>
        <p>Noticias</p>
    </nav>
    <?php include_once 'components/historial.php' ?>
    <?php include_once 'components/footer.php' ?>
</body>
</html>

<!--
ENLACE > localhost/clase_ejercicios/ejercicios_sesiones/_5_historial-paginas/
-->