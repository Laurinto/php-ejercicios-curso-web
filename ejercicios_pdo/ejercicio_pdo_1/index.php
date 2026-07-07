<?php // MIRAR DESPUÉS DEL MODELO
// enlaces necesarios
require_once 'config/conexion.php';
require_once 'controllers/producto_controller.php';

// obtener la conexión con SQL
$pdo = Conexion::obtener();
// creación del modelo con la conexión SQL
$modelo = new Producto($pdo);

// todas las acciones
$acciones = [
    'lista'=>'accion_lista',
    'nuevo'=>'accion_nuevo',
    'crear'=>'accion_crear', // ??
    'editar'=>'accion_editar',
    'actualizar'=>'accion_actualizar', // ??
    'confirmar_eliminar'=>'accion_confirmar_eliminar',
    'eliminar'=>'accion_eliminar' // ??
];

// que función escogerá
// index.php?accion=lista
$accion = $_GET['accion'] ?? 'lista';
// si existe tal accion en la lista $acciones...
if (isset($acciones[$accion])){
    // devuelve tal acción
    $fn = $acciones[$accion];
    $fn($modelo);
}
else{ // si no, ejecuta accion_listar
    accion_listar($modelo);
}

?>

<!--
enlace: /localhost/php-ejercicios-curso-web/ejercicios_pdo/ejercicio_pdo_1
-->


<!-- la base de datos
CREATE DATABASE IF NOT EXISTS ejercicios;
USE ejercicios;

CREATE TABLE IF NOT EXISTS productos (
    id          INT PRIMARY KEY AUTO_INCREMENT,
    nombre      VARCHAR(100) NOT NULL,
    categoria   VARCHAR(50)  NOT NULL,
    precio      DECIMAL(8,2) NOT NULL,
    stock       INT          NOT NULL DEFAULT 0,
    proveedor   VARCHAR(100)
);

SELECT * FROM productos;
-->