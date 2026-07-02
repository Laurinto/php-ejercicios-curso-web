<?php
session_start();

$pagina = $_GET['pagina']??'notas';
$accion = $_GET['accion']??'listar';

switch($pagina){
    case'notas':
        require_once 'controllers/notas_controller.php';
        $acciones = [
            'listar'=>'accion_ver',
            'ver'=>'accion_nuevo',
            'nuevo'=>'accion_crear',
            'crear'=>'accion_editar',
            'editar'=>'accion_actualizar',
            'actualizar'=>'accion_confirmar_eliminar',
            'confirmar_eliminar'=>'accion_eliminar'
        ];

        if (isset($acciones[$accion])){
            $funcion = $acciones[$accion];
            $funcion();
        }
        else {
            accion_listar();
        }

        break;
    default:
    http_response_code(404);
    echo'<h1>Página no encontrada</h1>';
}

?>


<!--
ENLACE: localhost/clase_ejercicios/ejercicios_mvc/
-->


