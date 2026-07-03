<?php
// ruta al archivo con la base de datos
define('ARCHIVO_NOTAS', __DIR__ . '/../datos/notas.txt');

// READ - obtener todas las notas
// devolverá un array asociativo con: id, titulo, contenido, fecha
function notas_todas(): array {
    if (!file_exists(ARCHIVO_NOTAS) || filesize(ARCHIVO_NOTAS) === 0) {
        return [];
    }

    $lineas = file(ARCHIVO_NOTAS, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $notas = [];

    foreach ($lineas as $indice => $linea) {
        $c = explode('|', $linea);
        $notas[] = [
            'id'        => $indice,
            'titulo'    => $c[0] ?? '',
            'contenido' => $c[1] ?? '',
            'fecha'     => $c[2] ?? '',
        ];
    }

    return $notas;
}

// READ - obtener la nota específica por índice
function nota_por_id(int $id): ?array { // devuelve array o null
    $notas = notas_todas();
    return $notas[$id] ?? null;
}

// CREATE - guardar la nota nueva
function nota_crear(string $titulo, string $contenido): void {
    // se remplaza el | por - momentaneamente para no romper el formato CSV
    $titulo = str_replace('|', '-', $titulo);
    $contenido = str_replace('|', '-', $contenido);
    $linea = implode('|', [$titulo,$contenido,date('d/m/Y')]) . PHP_EOL;
    file_put_contents(ARCHIVO_NOTAS,$linea,FILE_APPEND);
}

// UPDATE - actualizar una nota existente
function nota_actualizar(int $id, string $titulo, string $contenido): bool
{
    $lineas = file(ARCHIVO_NOTAS, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!isset($lineas[$id])) return false;

    $titulo = str_replace('|', '-', $titulo);
    $contenido = str_replace('|', '-', $contenido);

    // Conservamos la fecha original de la nota
    $c = explode('|', $lineas[$id]);
    $fecha_orig = $c[2] ?? date('d/m/Y');

    $lineas[$id] = implode('|', [$titulo, $contenido, $fecha_orig]);
    file_put_contents(ARCHIVO_NOTAS, implode(PHP_EOL, $lineas) . PHP_EOL);
    return true;
}

// DELETE - eliminar una nota existente
function nota_eliminar(int $id): bool
{
    $lineas = file(ARCHIVO_NOTAS, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!isset($lineas[$id])) return false;

    array_splice($lineas, $id, 1);
    $contenido = empty($lineas) ? '' : implode(PHP_EOL, $lineas) . PHP_EOL;
    file_put_contents(ARCHIVO_NOTAS, $contenido);
    return true;
}
?>