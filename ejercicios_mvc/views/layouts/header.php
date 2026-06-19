<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=htmlspecialchars($titulo_pagina??'App de notas')?></title>
</head>
<body>
    <header>
        <h1><a href="index.php?pagina=notas">App de notas</a></h1>
        <nav>
            <a href="index.php?pagina=notas">Ver todas</a>
            <a href="index.php?pagina=notas&accion=nuevo">Nueva nota</a>
        </nav>
    </header>
</body>
</html>