<?php
require_once __DIR__ . '/../modelos/alumno.php';

// listar TODOS los alumnos
function accion_listar(Alumno $modelo) :void{
    // modelo que usará
    $alumnos = $modelo->listar();
    // página que mostrará
    require __DIR__ . '/../vistas/alumno_lista.php';
}

function accion_crear(Alumno $modelo) :void{
    
    // elementos para el POST
    $nombre = trim($_POST['nombre'] ?? '');
    $apellidos = trim($_POST['apellidos'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $curso = trim($_POST['curso'] ?? '');
    if($nombre && $apellidos && $email && $curso){
        $modelo->crear($nombre, $apellidos, $email, $curso);
        header('Location:index.php');
        exit;
        }
    
    // pagina que mostrará
    require __DIR__ . '/../vistas/alumno_formulario.php';
}
?>