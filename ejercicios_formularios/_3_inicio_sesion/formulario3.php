<?php
$errores = [];
$nombre="";
$email="";
$edad="";
$contrasena="";
$repcontrasena="";

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $nombre = htmlspecialchars(trim($_POST["nombre"]??""));
    $email = htmlspecialchars(trim($_POST["email"]??""));
    $edad = trim($_POST["edad"]??"");

    $contrasena = htmlspecialchars($_POST["contrasena"]??"");
    $repcontrasena = htmlspecialchars($_POST["repcontrasena"]??"");

    // validar nombre y correo
    if (strlen($nombre) < 3 || strlen($nombre) > 60){
        $errores["nombre"] = "El nombre debe tener entre 3 y 60 carácteres";
    }

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errores["email"] = "El email no tiene el formato válido";
    }

    //validar edad
    if($edad === ""){// vacia
        $errores["edad"] = "Hay que escribir una edad";
    }
    elseif(!is_numeric($edad)){ // numérico
        $errores["edad"] = "Debes poner números únicamente";
    }

    elseif((int)$edad < 16 || (int)$edad > 99){
        $errores["edad"] = "Edad no válida";
    }

    // validar contraseñas
    if(strlen($contrasena) < 8){
        $errores["contrasena"] = "La contraseña debe tener al menos 8 carácteres";
    }
    elseif(!preg_match('/[0-9]/', $contrasena)){
        $errores["contrasena"] = "La contraseña no contiene números";
    }

    if ($contrasena !== $repcontrasena){
        $errores["repcontrasena"] = "Las contraseñas no coinciden";
    }

    if (empty($errores)){
        echo "
            <p>$nombre</p>
            <p>$email</p>
            <p>$edad</p>
            <p>$contrasena</p>
        ";
        exit();
        
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 3</title>
    <link rel="stylesheet" href="stylethree.css">
</head>
<body>
    <form method="post">
        <p>Nombre</p>
        <input type="text" name="nombre" id="nombre">
        <p>Email</p>
        <input type="text" name="email" id="email">
        <p>Edad</p>
        <input type="text" name="edad" id="edad">
        <p>Contraseña</p>
        <input type="password" name="contrasena" id="contrasena">
        <p>Repetir contraseña</p>
        <input type="password" name="repcontrasena" id="repcontrasena">
        <button type="submit">SIGUIENTE</button>

        <?php if (isset($errores["nombre"])): ?>
        <p class="error"><?= $errores["nombre"]?></p>
        <?php endif; ?>
        <?php if (isset($errores["email"])): ?>
        <p class="error"><?= $errores["email"]?></p>
        <?php endif; ?>
        <?php if (isset($errores["edad"])): ?>
        <p class="error"><?= $errores["edad"]?></p>
        <?php endif; ?>
        <?php if (isset($errores["contrasena"])): ?>
        <p class="error"><?= $errores["contrasena"]?></p>
        <?php endif; ?>
        <?php if (isset($errores["repcontrasena"])): ?>
        <p class="error"><?= $errores["repcontrasena"]?></p>
        <?php endif; ?>
    </form>
</body>
</html>