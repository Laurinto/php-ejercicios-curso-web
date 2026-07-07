<?php
require_once __DIR__ . '/../models/producto.php';

// LISTAR
function accion_lista(Producto $modelo) :void{
    // muestra todos los productos
    $productos = $modelo->todos();
    // titulo de la página
    $titulo_pagina = 'Productos';
    // páginas que necesita para mostrar
    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/productos/lista.php';
    require __DIR__ . '/../views/layouts/footer.php';
}

// mostrar -- formulario NUEVO
function accion_nuevo(Producto $modelo) :void{
    // titulo de la página
    $titulo_pagina = 'Nuevo producto';
    // páginas que necesita para mostrar
    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/productos/nuevo.php';
    require __DIR__ . '/../views/layouts/footer.php';
}
// procesar POST -- formulario NUEVO
function accion_crear(Producto $modelo) :void{
    // elementos necesarios para el POST
    $nombre = trim($_POST['nombre'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $precio = (float)($_POST['precio'] ?? 0);
    $stock = (int)($_POST['stock'] ?? 0);
    $proveedor = trim($_POST['proveedor'] ?? '');
    // asegurar que necesita para crear
    if($nombre && $categoria && $precio > 0){
        $modelo->crear($nombre, $categoria,$precio,$stock, $proveedor);
    }
    header('Location:index.php');
    exit;
}

// mostrar -- EDITAR formulario
function accion_editar(Producto $modelo) :void{
    // revisa que id coger a la hora de editar
    $id = (int)($_GET['id'] ?? -1);
    // lee el id específico
    $producto = $modelo->por_id($id);
    // redirige si no existe el producto
    if (!$producto){
        header('Location: index.php');
        exit;
    }
    // titulo de la página
    $titulo_pagina = 'Editar producto';
    // páginas que necesita para mostrar
    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/productos/editar.php';
    require __DIR__ . '/../views/layouts/footer.php';
}
// Procesar POST - EDITAR formulario
function accion_actualizar(Producto $modelo) :void{
    // elementos necesarios para el POST
    $id  = (int)($_POST['id'] ?? -1);
    $nombre = trim($_POST['nombre'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $precio = (float)($_POST['precio'] ?? 0);
    $stock = (int)($_POST['stock'] ?? 0);
    $proveedor = trim($_POST['proveedor'] ?? '');
    // asegurar que necesita para crear
    if($nombre && $categoria && $precio > 0){
        $modelo->actualizar($id, $nombre, $categoria,$precio,$stock, $proveedor);
    }
    header('Location:index.php');
    exit;
}

// ELIMINAR
function accion_confirmar_eliminar(Producto $modelo) :void{
    // revisa que id coger a la hora de editar
    $id = (int)($_GET['id'] ?? -1);
    // lee el id específico
    $producto = $modelo->por_id($id);
    // redirige si no existe el producto
    if(!$producto){
        header('Location:index.php');
        exit;
    }
    // páginas que necesita para mostrar
    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/productos/confirmar-eliminar.php';
    require __DIR__ . '/../views/layouts/footer.php';
}

function accion_eliminar(Producto $modelo) :void{
    // elementos necesarios para el POST
    $id  = (int)($_POST['id'] ?? -1);
    // que ejecuta para eliminar con su id correspondiente
    $modelo->eliminar($id);
    header('Location:index.php');
    exit;
}