<?php
// Esto es el CRUD --> Modelo
class Nota{
    private string $archivo;

    // ruta del archivo con la "base de datos"
    public function __construct(){
        $this->archivo = __DIR__ . '/../datos/notas.txt';
    }

    // READ -- leer todas las notas
    public function todas() :array{
        // comprueba si existe el archivo
        if(!file_exists($this->archivo) || filesize($this->archivo) === 0){
            return [];
        }
        // lee las líneas del archivo (detectando de forma automática los saltos de línea) y devuelve un array
        $lineas = file($this->archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        // crea el array vacío
        $notas = [];
        // recorre cada línea del archivo y cada iteración la recoge como índice y la línea que le corresponde
        foreach ($lineas as $indice => $linea){
            // divide el string de cada línea siguiendo como guía el elemento |
            $c = explode('|', $linea);
            // 
            $notas [] = [
                'id'=>$indice,
                'titulo'=>$c[0] ?? '',
                'contenido'=>$c[1] ?? '',
                'fecha'=>$c[2] ?? '',
            ];
        }
        return $notas;
    }

    // READ -- obtener la nota específica por índice
    public function por_id(int $id) :?array{
        $notas = $this->todas();
        return $notas[$id] ?? null;
    }

    // CREATE -- guardar la nota nueva
    public function crear(string $titulo,string $contenido) :void{
        // se remplaza el | por - momentáneamente, para no romper el formato CSV
        $titulo = str_replace('|','-', $titulo);
        $contenido = str_replace('|','-', $contenido);
        $linea = implode('|', [$titulo,$contenido,date('d/m/Y')]) . PHP_EOL;
        file_put_contents($this->archivo,$linea,FILE_APPEND);
    }

    // UPDATE -- actualizar nota existente
    public function actualizar(int $id,string $titulo,string $contenido) :bool{
        // obtener la lista con las notas
        $notas = $this->todas();
        // si no existen ids en líneas, devolver false
        if(!isset($notas[$id])) return false;

        // se remplaza el | por - momentáneamente, para no romper el formato CSV
        $titulo = str_replace('|','-', $titulo);
        $contenido = str_replace('|','-', $contenido);
        // Conservamos la fecha original de la nota
        $fecha_orig = $notas[$id]['fecha'];

        
        // ponemos en el id correspondiente, el nuevo titulo, contenido y la fecha original (actualizando array)
        $notas[$id] = [
            'id'=>$id,
            'titulo'=>$titulo,
            'contenido'=>$contenido,
            'fecha'=>$fecha_orig
            ];

        // se reconstruye la línea
        $lineas = array_map(
            function($nota){
                return $nota['titulo'] . '|' . $nota['contenido'] . '|' . $nota['fecha'];
            },
            $notas
        );

        file_put_contents($this->archivo, implode(PHP_EOL, $lineas) . PHP_EOL);
        // devolver true
        return true;
    }

    // DELETE
    public function eliminar( int $id) :bool{
        // obtener la lista con las notas
        $notas = $this->todas();
        // si NO existe esa nota con ese id, devolver false
        if(!isset($notas[$id])) return false;
        // eliminar la nota
        unset($notas[$id]);
        // devolver una callback con un nuevo array que devuelve en $nota el string que se ve
        $lineas = array_map(
            function($nota){
                return $nota['titulo'] . '|' . $nota['contenido'] . '|' . $nota['fecha'];
            },
            $notas
        );

        $contenido = empty($lineas) ? '' : implode(PHP_EOL, $lineas) . PHP_EOL;
        file_put_contents($this->archivo, $contenido);
        // devolver true
        return true;
    }
}
?>