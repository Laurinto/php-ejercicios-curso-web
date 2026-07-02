<?php
session_start();

$catalogo = [
    1 => ['nombre' => 'teclado mecánico', 'precio' => 89.99,'emoji' => '🎹'],
    2 => ["nombre" => "ratón inalámbrico", "precio" => 45.50, "emoji" => "🐭"],
    3 => ["nombre" => 'monitor 27"', "precio" => 299.00, "emoji" => "📺"],
    4 => ["nombre" => "alfombrilla XL", "precio" => 89.99, "emoji" => "🗿"],
    5 => ["nombre" => "Hub USB-C", "precio" => 89.99, "emoji" => "⚓"]
];

$id = (int)($_POST["id"]??0);

if (isset($catalogo[$id])){ //id existe en catalogo
    if (!isset($_SESSION['carrito'])){
        $_SESSION['carrito'] = [];
    }
    $_SESSION['carrito'][] = $id;
}

header('Location:tienda.php');
exit;
?>