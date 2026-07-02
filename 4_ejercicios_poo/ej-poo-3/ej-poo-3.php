<?php
class Carrito{
    private array $lineas = [];
    private float $descuento = 0;

    public function __construct(){
        // vacio de momento
    }

    // eliminar y añadir productos
    public function agregar(string $nombre, float $precio, int $cantidad) :void{
        $this->lineas[] = [
            'nombre' => $nombre,
            'precio' => $precio,
            'cantidad' => $cantidad
        ];
    }
    public function eliminar(string $nombre) :bool{
        foreach ($this->lineas as $i=>$l){
            if($l['nombre'] === $nombre){
                array_splice($this->lineas, $i,1); // elimina SOLO ese elemento
                return true; // con true devuelve que se ha eliminado
            }
        }
        return false; // con false es poraue no lo ha encontrado
    }

    // contar artículos
    public function contarArticulos(){
        //
    }

    // cálculo de los totales
    public function calcularSubtotal(): float{
        $total = 0; // total vacío
        foreach($this->lineas as $l){ // conforme revisa cada precio y cantidad por línea, también va sumando
            $total += $l['precio'] * $l['cantidad'];
        }
        return round ($total, 2);
    }
    public function aplicarDescuento(float $pct) :void{ // revisar de donde viene el porcentaje
        if ($pct < 0 || $pct > 100){
            echo 'Error: el descuento debe estar entre 0 y 100';
            return;
        }
        $this->descuento = $pct;
    }
    public function calcularTotal() :float{
        $subtotal  = $this->calcularSubtotal();
        return round($subtotal * (1 - $this->descuento / 100),2);
    }
    public function calcularTotalIva() :float{
        $total = $this->calcularTotal();
        return array_sum(array_column($this->lineas, 'cantidad'));
    }

    public function estarVacio() : bool{
        return empty($this->lineas);
    }

    // como mostrará la clase de golpe
    public function resumen(){
        if($this->estarVacio()) return 'El carrito está vacío';
        // return con todo
        return
            "Cantidad: {$this->contarArticulos()} artículos --" . // articulos
            "Subtotal: {$this->calcularSubtotal()} € --" . // subtotal
            "Descuento: {$this->descuento} € --" . // descuento
            "Total: {$this->calcularTotal()} € --" . // total
            "Total con IVA: {$this->calcularTotalIva()} €" ; // total con iva
    }

    // si se quiere meter cada resultado de forma individual, hay que tener en cuenta que para el descuento, al usar una propiedad privada, va a tener que usar un getter (función "getDescuento()" que recoja el resultado del descuento)
}

// HACER EL CARRITO Y METER EL CONTENIDO
$carrito = new Carrito();
// añadir un producto
$carrito->agregar("Silla",40.56,3);
$carrito->agregar("Mesa", 60.78,1);
$carrito->agregar("Mantel", 15.99, 2);
$carrito->agregar("Servilleta", 1.20, 5);
// aplicar el descuento
$carrito->aplicarDescuento(10);

?>

<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Carrito</h1>
    <main>
        <?php echo $carrito->resumen(); ?>
    </main>
    <script src"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!--
enlace local -> localhost/php-ejercicios-curso-web/ejercicios_poo/ej-poo-3/ej-poo-3.php
-->