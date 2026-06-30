<?php
class Producto{
    public string $nombre;
    public float $stock;
    public bool $activo;
    private string $precio;

    public function __construct(string $nombre, float $stock, bool $activo = true, string $precio){
        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->activo = $activo;
        $this->setPrecio($precio); // así viene validado
    }

    public function setPrecio(): void{
        if ($precio < 0){
                echo "error: el precio no debe ser negativo.";
            }
            else{
                $this->precio=$precio;
            }
    }

    public function getPrecio(): float{
        return $this->precio;
    }

    public function precioConIva(): float{
        return round($this->precio * 1.21,2);
    }

    public function ficha(){
        
    }
}

// los productos
$p1 = new Producto('Teclado mecánico', 89.99, 15);
$p2 = new Producto('Ratón inalámbrico', 45.50, 8);
$p3 = new Producto('Monitor 27"',299.00,3);

// resultados

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase producto con constructor y private</title>
</head>
<body>
    
</body>
</html>