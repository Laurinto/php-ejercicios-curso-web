<?php
// A ESTE EJERCICIO HAY QUE PONERLE CLASES 
// los documentos que cambian son los controllers y los models


// index.php — Front Controller
session_start();

$pagina = $_GET['pagina'] ?? 'notas';
$accion = $_GET['accion'] ?? 'listar';

switch ($pagina) {
    case 'notas':
        require_once 'controllers/notas_controllers.php';
        $modelo = new Nota();

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
            $funcion($modelo); // llamar a la función por su nombre
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
enlace: /localhost/php-ejercicios-curso-web/4_ejercicios_poo/ej-poo-4/
-->