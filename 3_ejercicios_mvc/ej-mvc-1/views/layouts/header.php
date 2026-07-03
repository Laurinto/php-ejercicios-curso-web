<?php
// views/layouts/header.php
// $titulo_pagina viene del Controlador
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($titulo_pagina ?? 'App de Notas') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1><a href="index.php?pagina=notas">📝 App de Notas</a></h1>
        <nav>
            <a href="index.php?pagina=notas">Ver todas</a>
            <a href="index.php?pagina=notas&accion=nuevo">+ Nueva nota</a>
        </nav>
    </header>
    <main>