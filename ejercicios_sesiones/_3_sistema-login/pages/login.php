<?php
session_start();

$error = "";
// si existe sesión y el login de la sesión es true...
if (isset($_SESSION['login']) && $_SESSION['login'] === true){
    // ir al dashboard
    header('Location:dashboard.php');
    exit;
}

require_once '../components/datos.php';

// COSAS DE CARA AL FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $usuario = trim($_POST['usuario'] ?? '');
    $clave = $_POST['clave']??'';
    $encontrado = false;

    // ver si coincide todas los elementos escritos con lo que hay en $usuarios
    foreach($usuarios as $u){
        // si lo del array coincide con lo escrito...
        if ($u['usuario'] === $usuario && $u['clave'] === $clave){
            $_SESSION['login'] = true;
            $_SESSION['nombre'] = $u['nombre'];
            $_SESSION['rol'] = $u['rol'];
            $encontrado = true;
            break;
        }
    }
    // si $encontrado es true...
    if ($encontrado){
        $error = "";
        header('Location: dashboard.php');
        exit;
    }
    else{ // mensaje error de la contraseña o usuario;
        $error = "el usuario o contraseña no coincide";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <main>
        <form method="post">
            <h1>Log in</h1>
            <p>Usuario</p>
            <input type="text" name="usuario">
            <p>Contraseña</p>
            <input type="password" name="clave">
            <button type="submit">Iniciar sesión</button>
            <p class="alerta"><?= $error ?></p>
        </form>
    </main>
    <?php include_once "footer.php" ?>
</body>
</html>