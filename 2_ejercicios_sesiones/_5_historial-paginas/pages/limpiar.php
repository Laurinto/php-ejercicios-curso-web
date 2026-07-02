<?php
session_start();

$pagina_actual = 'Limpiar';

if ($_SERVER['REQUEST_METHOD']==='POST'){
    unset($_SESSION['historial']);
    header('Location:../index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limpiar</title>
</head>
<body>
    <h1>¿Limpiar historial?</h1>
    <form method="post">
        <button type="button">No</button>
        <button type="submit">Sí</button>
    </form>
    <?php include_once '../components/historial.php' ?>
    <?php include_once '../components/footer.php' ?>
</body>
</html>