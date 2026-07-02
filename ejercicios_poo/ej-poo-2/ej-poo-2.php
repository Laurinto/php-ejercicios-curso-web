<?php
class Producto{
    public string $nombre;
    public int $stock;
    public bool $activo;
    private float $precio;

    public function __construct(string $nombre, float $precio, int $stock, bool $activo = true, ){ // importante fijarse el tipo de dato
        $this->nombre = $nombre;
        $this->stock = $stock;
        $this->activo = $activo;
        $this->setPrecio($precio); // así viene validado
    }

    public function setPrecio(float $precio): void{ // validación del precio, HACER REFERENCIA A PRECIO, importante
        if ($precio < 0){
                echo "error: el precio no debe ser negativo.";
                return;
            }
        $this->precio=$precio;
        
    }

    public function getPrecio(): float{ // dar el precio
        return $this->precio;
    }

    public function precioConIva(): float{ // dar el precio con iva
        return round($this->precio * 1.21,2);
    }

    public function ficha(): string{ // dar ficha con el nombre, precio y stock
        return "{$this->nombre} -- {$this->precio}€ {$this->stock} unidades";
    }

    public function reducirStock(int $n): void{ // garantiza que el stock no baje a cero
        $this->stock = max(0,$this->stock - $n); // el número que saca es 3 que está referenciado abajo 
    }
}

// los productos
$p1 = new Producto('Teclado mecánico', 89.99, 15);
$p2 = new Producto('Ratón inalámbrico', 45.50, 8);
$p3 = new Producto('Monitor 27"',299.00,3);

// resultados

// stock viejo
echo $p1->ficha();
echo $p1->precioConIva() . '€ con IVA';

// actualizando stock, con nº 3 de ejemplo
$p1->reducirStock(3); // el 3 es para darle valor a $n
// stock nuevo
echo $p1->ficha();

// ejemplo de stock con error
$p2->setPrecio(-10);
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

<!--
enlace: http://localhost/php-ejercicios-curso-web/ejercicios_poo/ej-poo-2/ej-poo-2.php
-->