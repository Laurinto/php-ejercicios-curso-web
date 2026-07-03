<?php
require_once __DIR__ . '/../models/notas_model.php';

// ─── LISTAR ───────────────────────────────────────────────────────
function accion_listar(): void {
    $notas = notas_todas();
    $titulo_pagina = 'Mis notas';
    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/notas/lista.php';
    require __DIR__ . '/../views/layouts/footer.php';
}

// ─── VER DETALLE ──────────────────────────────────────────────────
function accion_ver(): void {
    $id = (int)($_GET['id'] ?? -1);
    $nota = nota_por_id($id);
    if ($nota === null) { _redirigir(); return; }
    $titulo_pagina = htmlspecialchars($nota['titulo']);
    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/notas/ver.php';
    require __DIR__ . '/../views/layouts/footer.php';
}

// ─── FORMULARIO NUEVA NOTA ────────────────────────────────────────
function accion_nuevo(): void {
    $titulo_pagina = 'Nueva nota';
    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/notas/nuevo.php';
    require __DIR__ . '/../views/layouts/footer.php';
}

// ─── GUARDAR NOTA NUEVA (POST) ────────────────────────────────────
function accion_crear(): void {
    $titulo = trim($_POST['titulo'] ?? '');
    $contenido = trim($_POST['contenido'] ?? '');
    if (!empty($titulo)) {
        nota_crear($titulo, $contenido);
    }
    _redirigir();
}

// ─── FORMULARIO EDITAR ────────────────────────────────────────────
function accion_editar(): void {
    $id = (int)($_GET['id'] ?? -1);
    $nota = nota_por_id($id);
    if ($nota === null) { _redirigir(); return; }
    $titulo_pagina = 'Editar nota';
    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/notas/editar.php';
    require __DIR__ . '/../views/layouts/footer.php';
}

// ─── GUARDAR EDICIÓN (POST) ───────────────────────────────────────
function accion_actualizar(): void {
    $id = (int)($_POST['id'] ?? -1);
    $titulo = trim($_POST['titulo'] ?? '');
    $contenido = trim($_POST['contenido'] ?? '');
    if (!empty($titulo)) {
        nota_actualizar($id, $titulo, $contenido);
    }

    _redirigir();
}

// ─── CONFIRMAR ELIMINACIÓN ────────────────────────────────────────
function accion_confirmar_eliminar(): void {
    $id = (int)($_GET['id'] ?? -1);
    $nota = nota_por_id($id);
    if ($nota === null) { _redirigir(); return; }
    $titulo_pagina = 'Confirmar eliminación';
    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/notas/confirmar-eliminar.php';
    require __DIR__ . '/../views/layouts/footer.php';
}

// ─── ELIMINAR (POST) ──────────────────────────────────────────────
function accion_eliminar(): void {
    $id = (int)($_POST['id'] ?? -1);
    nota_eliminar($id);
    _redirigir();
}

// ─── AUXILIAR: redirigir a la lista ───────────────────────────────
// Función privada (convención: prefijo _) para no repetir código
function _redirigir(): void {
    header('Location: index.php?pagina=notas');
    exit;
}