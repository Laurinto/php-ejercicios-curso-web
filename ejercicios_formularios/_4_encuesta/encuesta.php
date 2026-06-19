<?php
$nombre = "";
$valoracion = "";
$aspectos = [];
$dificil = "";
$sugerencias = "";
$errores = [];

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = $_POST["nombre"]??"";
    $valoracion = $_POST["general"]??"";
    $aspectos = $_POST["positivo"]??"";
    $dificil = $_POST["dificil"]??"";
    $sugerencias = $_POST["sugerencia"]??"";

    // validar todo menos sugerencias
    if ($nombre === ""){
        $errores["nombre"] = 'El campo "nombre" está vacío';
    }
    if ($valoracion === ""){
        $errores["valoracion"] = 'El campo "valoración" está vacío';
    }


    if (strlen($sugerencias) > 300){
        //
    }

    if (empty($errores)){
        echo "
            <p>$nombre</p>
            <p>$valoracion</p>
            <p>$aspectos</p>
            <p>$dificil</p>
            <p>$sugerencias</p>
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
    <title>Formulario 4 - Encuesta</title>
    <link rel="stylesheet" href="encuestastyle.css">
</head>
<body>
    <form method="post">
        <p>Nombre</p>
        <input type="text" name="nombre" id="">
        
        <p>Valoración general del curso</p>
        <label><input type="radio" name="general" value="Excelente">Excelente</label>
        <label><input type="radio" name="general" value="Buena">Buena</label>
        <label><input type="radio" name="general" value="Regular">Regular</label>
        <label><input type="radio" name="general" value="Mala">Mala</label>
        
        <p>Aspectos positivos</p>
        <label><input type="checkbox" name="positivo" value="Contenido claro">Contenido claro</label>
        <label><input type="checkbox" name="positivo" value="Buena metodología">Buena metodología</label>
        <label><input type="checkbox" name="positivo" value="Ejemplos útiles">Ejemplos útiles</label>
        <label><input type="checkbox" name="positivo" value="Buen ritmo">Buen ritmo</label>
        <label><input type="checkbox" name="positivo" value="Material de apoyo">Material de apoyo</label>

        <p>Lo más dificil hasta ahora</p>
        <select name="dificil" id="">
            <option value="Variables y tipos">Variables y tipos</option>
            <option value="Control de flujo">Control de flujo</option>
            <option value="Funciones">Funciones</option>
            <option value="Arrays">Arrays</option>
            <option value="Formularios PHP">Formularios PHP</option>
        </select>
        <p>Sugerencias</p><!--OPCIONAL-->
        <textarea name="sugerencia" id="">Máximo 300 carácteres...</textarea>
        <button type="submit">ENVIAR</button>
    </form>
</body>
</html>