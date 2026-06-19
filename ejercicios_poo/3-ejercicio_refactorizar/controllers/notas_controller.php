<?php
// esta parte se encarga de decir que hacer cuando se acciona algo.
// NO incluye como se manipulan los datos, solo a donde ir y que datos
// requiere.

require_once __DIR__ . '../models/notas_model.php';

// sección de listar cosas necesarias para ver la web

function accion_listar():void{
    $notas = nota_todas();
    $titulo_pagina = 'Mis notas';
    require __DIR__ . '../views/layouts/header.php';
    require __DIR__ . '../views/notes/lista.php';
    require __DIR__ . '../views/layouts/footer.php';
}

// sección de ver detalles
function accion_ver():void{
    $id = (int)($_GET['id']??-1); // coger del formulario (en GET) los ids
    $nota = $nota_por_id($id);

    if($nota === null){ // si no hay nada
        _redirigir();
        return;
    }

    require __DIR__ . '../views/layouts/header.php';
    require __DIR__ . '../views/notes/ver.php';
    require __DIR__ . '../views/layouts/footer.php';
}

// sección de nuevas notas
function accion_nuevo():void{
    $titulo_pagina='Nueva nota';
    require __DIR__ . '../views/layouts/header.php';
    require __DIR__ . '../views/notes/nuevo.php';
    require __DIR__ . '../views/layouts/footer.php';
}

// guardar la nueva nota (forma parte del POST)
function accion_crear():void{
    $titulo = trim($_POST['titulo']??'');
    $contenido = trim($_POST['contenido']??'');
    if(!empty($titulo)){
        nota_crear($titulo,$contenido);
    }
    _redirigir();
}

// sección de editar notas
function accion_editar():void{
    $id = (int)($_GET['id']??-1);
    $nota = nota_por_id($id);

    if($nota===null){
        _redirigir();
        return;
    }

    require __DIR__ . '../views/layouts/header.php';
    require __DIR__ . '../views/notes/editar.php';
    require __DIR__ . '../views/layouts/footer.php';
}

// Guardar la edición (forma parte del POST)
function accion_actualizar():void{
    $id = (int)($_POST['id']??-1);
    $titulo = trim($_POST['titulo']??'');
    $contenido = trim($_POST['contenido']??'');

    if(!empty($titulo)){
        nota_actualizar($id,$titulo,$contenido);
    }
    _redirigir();
}

// sección de confirmar eliminación
function accion_confirmar_eliminar():void{
    $id = (int)($_POST['id']??-1);
    $nota = nota_por_id($id);
    
    if($nota === null){
        _redirigir();
        return;
    }
    
    $titulo_pagina='Confirmar eliminación';
    require __DIR__ . '../views/layouts/header.php';
    require __DIR__ . '../views/notes/confirmar_eliminar.php';
    require __DIR__ . '../views/layouts/footer.php';
}

// guardar eliminación (forma parte del POST)
function accion_eliminar():void{
        $id = (int)($_POST['id']??-1);
    nota_eliminar($id);
    _redirigir();
}


// REDIRECCIONES (está abajo pero hay menciones a esta función antes de que exista)
function _redirigir():void{
    header('Location:index.php?pagina=notas');
    exit;
}
?>