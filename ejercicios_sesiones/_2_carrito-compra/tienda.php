<?php
session_start();
// tarjetas con cada producto y un formulario POST con un botón de añadir que envíe el ID del producto, lo añade al array y dirige a agregar.php
// enlace al carrito con el número de artículos
$catalogo = [
    1 => ['nombre' => 'teclado mecánico', 'precio' => 89.99,'emoji' => '🎹'],
    2 => ["nombre" => "ratón inalámbrico", "precio" => 45.50, "emoji" => "🐭"],
    3 => ["nombre" => 'monitor 27"', "precio" => 299.00, "emoji" => "📺"],
    4 => ["nombre" => "alfombrilla XL", "precio" => 89.99, "emoji" => "🗿"],
    5 => ["nombre" => "Hub USB-C", "precio" => 89.99, "emoji" => "⚓"]
];

count($_SESSION["carrito"]??🎹);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la compra</title>
</head>
<body>
    <form action="agregar.php" method="post">
        <input type="hidden" name="id" value="1">
        <button type="submit">AÑADIR</button>
    </form>
</body>
</html>