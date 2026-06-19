<?php
$tema = $_COOKIE['tema']??'claro';
$idioma = $_COOKIE['idioma']??'es';
$usuario_guardado = htmlspecialchars($_COOKIE['usuario_guardado']??'');

$temas_validos = ['claro','oscuro'];
$idiomas_validos = ['es','en','fr'];
$textos = [
    'es' => [
        'titulo' => 'Mis preferencias',
        'guardar' => 'Guardar prefencias',
        'tema' => 'Tema',
        'claro' => 'Claro',
        'oscuro' => 'Oscuro',
        'idioma' => 'Idioma',
        'usuario' => 'Usuario',
    ],
    'en' => [
        'titulo' => 'My preferences',
        'guardar' => 'Save preferences',
        'tema' => 'Theme',
        'claro' => 'Ligth',
        'oscuro' => 'Dark',
        'idioma' => 'Language',
        'usuario' => 'User'
    ],
    'fr' => [
        'titulo' => 'Mes préferences',
        'guardar' => 'Enregistrer',
        'tema' => 'Thème',
        'claro' => 'Clair',
        'oscuro' => 'Sombre',
        'idioma' => 'Langue',
        'usuario' => 'Utilisateur'
    ],
];
$texto = $textos[$idioma]??$textos['es'];

// VALIDACIÓN EN CASO DE QUE NO TENGA NADA DECIDIDO
// si en el array NO está en tema 'claro' u 'oscuro', recoger del formulario 'claro'
if (!in_array($tema, $temas_validos)) {
    $tema ='claro';
}
// si en el array NO están esos idiomas, recoger del formulario
if (!in_array($idioma, $idiomas_validos)){
    $idioma = 'es';
}

// CUANDO SE REALIZE UN FORMULARIO POST
if ($_SERVER['REQUEST_METHOD']==='POST'){
    // comparación de los dos arrays y dando como resultado lo escrito o lo que hay por defecto en función de lo escrito
    if (in_array($_POST['tema']??'',$temas_validos)){
        $tema = $_POST['tema'];
    }
    else{
        $tema = 'claro';
    }

    if (in_array($_POST['idioma']??'',$idiomas_validos)){
        $idioma = $_POST['idioma'];
    }
    else{
        $idioma = 'es';
    }

    setcookie('tema', $tema, time() + 30*24*60*60, '/'); // 30 días de cookies
    setcookie('idioma', $idioma, time() + 30*24*60*60, '/');

    // si existe "recordar" y está vacío nombre
    if(isset($_POST['recordar']) && !empty($_POST['nombre'])){
        setcookie('usuario_guardado', htmlspecialchars(trim($_POST['nombre'])), time()+7*24*60*60, '/'); // 7 días de cookies
    }
    else{
        setcookie('usuario_guardado', '', time()-3600, '/');
    }
    header('Location: preferencias.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias</title>
    <link rel="stylesheet" href="style-<?= $tema ?>.css">
</head>
<body>
    <header>
        <h1><?= $texto['titulo'] ?></h1>
    </header>
    <form method="post">
        <p><?= $texto['tema'] ?></p>
        <select name="tema">
            <option value="claro"><?= $texto['claro'] ?></option>
            <option value="oscuro"><?= $texto['oscuro'] ?></option>
        </select>
        <p><?= $texto['idioma'] ?></p>
        <select name="idioma">
            <option value="es">es</option>
            <option value="en">en</option>
            <option value="fr">fr</option>
        </select>
        <p><?= $texto['usuario'] ?></p>
        <input type="text" name="nombre" value="<?= $usuario_guardado ?>"><!-- RECORDAR QUE LO DEL VALUE MUESTRA QUE TEXTO TENDRÁ EL INPUT ADENTRO-->
        <label>
            <input type="checkbox" name="recordar">
            ¿Recordar nombre?
        </label>
        <button type="submit"><?= $texto['guardar'] ?></button> 
    </form>
</body>
</html>

<!--
ENLACE LOCALHOST: http://localhost/clase_ejercicios/ejercicios_sesiones/_4_preferencias-usuario-tema/preferencias.php
-->