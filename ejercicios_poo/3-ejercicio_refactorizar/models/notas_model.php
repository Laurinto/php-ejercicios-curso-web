<?php
// esta parte del código se encarga de los controles a la hora
// de manipular las notas. NO se encarga de recoger datos, solo
// guardarlos o manipularlos. NO se encarga de redirigir.



// RUTA DEL ARCHIVO CON LAS NOTAS - necesario para que todas las funciones puedan mirar donde está dicho documento
define('ARCHIVO_NOTAS',__DIR__ . '../data/notas.txt');

// OBTENER TODAS LAS NOTAS
function nota_todas(): array { // debe retornar array si o si
    if(!file_exists(ARCHIVO_NOTAS) || filesize(ARCHIVO_NOTAS) === 0){ // si no existe el archivo o el tamaño es 0
        return [];
    }

    $lineas = file(ARCHIVO_NOTAS, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
    $notas = [];
    foreach($lineas as $l => $linea){
        $c = explode('|', $linea);
        $notas[] = [
            'id'=>$i,
            'titulo'=>$c[0]??'',
            'contenido'=>$c[1]??'',
            'fecha'=>$c[2]??''
        ];
    }
    return $notas;
}

// LEER DATOS DE LAS NOTAS
    function nota_por_id(int $id): ?array{ // tiene que devolver un array o null
        $notas = $nota_todas();
        return $notas[$id] ?? null; // devuelve el id de notas o null
    }

// GUARDAR (y crear) LA NOTA NUEVA
function nota_crear(string $titulo, string $contenido): void{
    // se cambia el icono de separación para que no se rompa el formato CSV
    $titulo = str_replace('|', '-', $titulo);
    $contenido = str_replace('|', '-', $contenido);
    // unir elementos del array en un string
    $linea = implode('|', [$titulo, $contenido, date('d/m/Y')]) . PHP_EOL;
    file_put_contents(ARCHIVO_NOTAS, implode(PHP_EOL));
}

// ACTUALIZAR NOTA EXISTENTE
// debe devolver bool (true o false)
function nota_actualizar(int $id, string $titulo, string $contenido): bool{
    $lineas = file(ARCHIVO_NOTAS, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
    // si no existen ids de lineas, false
    if (!isset($lineas[$id])) return false;
    // se cambia el icono de separación para que no se rompa el formato CSV
    $titulo = str_replace('|', '-', $titulo);
    $contenido = str_replace('|', '-', $contenido);
    $c = explode('|', $lineas[$id]); // separa los textos (ids) del array $linea (titulo|contenido|fecha) para convertirlos en nuevos arrays
    $fecha_orig = $c[2]??date('d/m/Y'); // si $c[2] existe y NO es null, se mete la fecha que ya tiene $c[2], si no, se mete el date()

    $lineas[$id] = implode('|', [$titulo,$contenido,$fecha_orig]);
    file_put_contents(ARCHIVO_NOTAS, $contenido);
    return true;
}


// ELIMINAR LA NOTA EXISTENTE
function nota_eliminar(int $id):bool{
    $lineas = file(ARCHIVO_NOTAS, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
    if(!isset($lineas[$id])){
        return false;
    }
    array_splice($lineas,$id,1); // eliminar una parte del array
    if (empty($lineas)){
        $contenido = '';
    }
    else{
        $contenido = implode(PHP_EOL,$lineas) . PHP_EOL;
    }
    file_put_contents(ARCHIVO_NOTAS,$contenido);
    return true;
}

?>