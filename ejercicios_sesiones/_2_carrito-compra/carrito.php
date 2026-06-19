<?php
session_start();

$catalogo = [
    1 => ['nombre' => 'teclado mecánico', 'precio' => 89.99,'emoji' => '🎹'],
    2 => ["nombre" => "ratón inalámbrico", "precio" => 45.50, "emoji" => "🐭"],
    3 => ["nombre" => 'monitor 27"', "precio" => 299.00, "emoji" => "📺"],
    4 => ["nombre" => "alfombrilla XL", "precio" => 89.99, "emoji" => "🗿"],
    5 => ["nombre" => "Hub USB-C", "precio" => 89.99, "emoji" => "⚓"]
];

$carrito = $_SESSION['carrito']??🎹;
$cantidades = array_count_values($carrito);
$total = 0;

foreach ($cantidades as $id => $cantidad){
    $precio = $_SESSION['carrito']??[];
    $subtotal = $precio * $cantidad;
    $total =+ $subtotal;
    echo "<tr><td>$subtotal €</td></td>";
    echo "<td>$cantidad</td><td>$subtotal €</td></tr>";
}

echo "<p>Total: $total</p>";

?>



