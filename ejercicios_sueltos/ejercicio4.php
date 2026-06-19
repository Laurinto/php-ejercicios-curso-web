<?php
$productos = [
    [ //1
        "nombre" => "Jose",
        "precio" => 300.95,
        "stock" => 3,
        "categoria" => "sofá"
    ],
    [//2
        "nombre" => "Amparo",
        "precio" => 245.50,
        "stock" => 5,
        "categoria" => "amparador"
    ],
    [//3
        "nombre" => "Segio",
        "precio" => 40.0,
        "stock" => 0,
        "categoria" => "silla"
    ],
    [//4
        "nombre" => "Josefa",
        "precio" => 450.90,
        "stock" => 0,
        "categoria" => "sofá"
    ],
    [//5
        "nombre" => "Cecilia",
        "precio" => 4.90,
        "stock" => 35,
        "categoria" => "cojín"
    ],
    [//6
        "nombre" => "Sara",
        "precio" => 70.98,
        "stock" => 20,
        "categoria" => "silla"
    ],
];

function mostrarTexto($productos){
    $textoHTML = "";

    
    foreach ($productos as $producto){
        $textoStock = "";
        if ($producto["stock"] > 0){
            $textoStock = 'Stock disponible: ' . $producto["stock"];
        }
        else{
            $textoStock = "Sin stock";
        }

        $textoHTML .= '
            <tr>
                <th>' . $producto["nombre"] . '</th>
                <td>' . $producto["precio"] . '</td>
                <td>' . $producto["categoria"] . '</td>
                <td>' . $textoStock . '</td>
            </tr>
            ';
    }
    return $textoHTML;
}

function calculoStock($productos){
    // calcular el precio total del stock actual de cada producto
    
    foreach ($productos as $producto){
        $precioStockProducto = $productos["precio"] * $productos["stock"]; // ESTÁ A MEDIAS
    }
}

function filtrarPorCategoria($productos){
    // ordenar de menor a mayor precio de stock total
    // y devolver solo los productos de una categoría concreta.
    
}

function mostrarResumen($productos){
    // mostrar un resumen con el precio total, valor total del inventario, producto más caro y producto más barato
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <header>
        <h1>Productos</h1>
        <table>
            <?=mostrarTexto($productos);?>
        </table>
    </header>
    <main>
        <section>
            <h2>Precio stock de los productos</h2>
        </section>
        <section>
            <h2>Resumen</h2>
            <table>
                <?=mostrarResumen($productos)?>
            </table>
        </section>
    </main>

    <style>
        table,tr,td,th{
            border: 1px solid #000;
            border-collapse: collapse;
        }
    </style>
</body>
</html>

<!--
PENDIENTE
- Poner un color distinto a cada minitabla
- función para calcular el valor total del inventario (precio x stock)
-->
