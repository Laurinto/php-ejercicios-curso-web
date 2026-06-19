<?php
session_start();

$usuario = $_SESSION['nombre'];
$rol = $_SESSION['rol'];

$textoParaAdmin = "<section><p>Esto solo se muestra si eres administrador</p></section>"

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <h1>Esto es el dashboard</h1>
        <p>Nombre: <?= $usuario ?></p>
        <p>Rol: <?= $rol ?></p>
        <?php if ($rol === 'administrador'){
            echo $textoParaAdmin;
        }
        ?>
        <nav>
            <a href="perfil.php">Perfil</a>
            <a href="logout.php">¿Cerrar sesión?</a>
        </nav>
    </main>
    <?php include_once "footer.php" ?>
</body>
</html>