<?php
// index.php — Front Controller
session_start();

$pagina = $_GET['pagina'] ?? 'notas';
$accion = $_GET['accion'] ?? 'listar';

switch ($pagina) {
    case 'notas':
        require_once 'controllers/notas_controllers.php';

        // Mapa de acciones válidas → función correspondiente
        // Seguridad: solo se pueden llamar funciones de esta lista
        $acciones = [
            'listar'             => 'accion_listar',
            'ver'                => 'accion_ver',
            'nuevo'              => 'accion_nuevo',
            'crear'              => 'accion_crear',
            'editar'             => 'accion_editar',
            'actualizar'         => 'accion_actualizar',
            'confirmar_eliminar' => 'accion_confirmar_eliminar',
            'eliminar'           => 'accion_eliminar',
        ];

        if (isset($acciones[$accion])) {
            $funcion = $acciones[$accion];
            $funcion(); // llamar a la función por su nombre
        } else {
            accion_listar();
        }
        break;

    default:
        http_response_code(404);
        echo '<h1>Página no encontrada</h1>';
}

?>

    <!--
        enlace: /localhost/php-ejercicios-curso-web/3_ejercicios_mvc/ej-mvc-1/index.php
    -->