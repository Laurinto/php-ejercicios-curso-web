<?php
require_once 'config/conexion.php';
require_once 'controladores/alumno_controlador.php';

$pdo = Conexion::obtener();
$modelo = new Alumno($pdo);

// las acciones
$acciones = [
    'listar'=>'accion_listar',
    'crear'=>'accion_crear'
];

$accion = $_GET['accion'] ?? 'lista';
if (isset($acciones[$accion])){
    $fn = $acciones[$accion];
    $fn($modelo);
}
else{
    accion_listar($modelo);
}
?>

<!--
enlace: /localhost/php-ejercicios-curso-web/examen_crud/
-->