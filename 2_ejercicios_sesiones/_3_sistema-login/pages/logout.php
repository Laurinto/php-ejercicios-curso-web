<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST'){ // cosas que hacer en el submit
    $_SESSION = [];
    session_destroy();
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Log out</h1>
    <form method="post">
        <h2>¿Seguro que quieres cerrar sesión?</h2>
        <a href="dashboard.php"><button type="button">No</button></a>
        <button type="submit">Sí</button>
    </form>
    <?php include_once "footer.php" ?>
</body>
</html>