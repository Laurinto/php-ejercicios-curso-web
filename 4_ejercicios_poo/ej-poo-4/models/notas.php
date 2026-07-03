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
        // lee las líneas del archivo y devuelve un array
        $lineas = file($this->archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        // crea el array vacío
        $notas = [];
        // 
        foreach ($lineas as $indice => $linea){
            // divide el string
            $c = explode('|', $linea);
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
        $notas = todas();
        return $notas[$id] ?? null;
    }

    // CREATE -- guardar la nota nueva
    public function crear(){
        // se remplaza el | por - momentáneamente, para no romper el formato CSV
    }

    // UPDATE
    public function actualizar(){}

    // DELETE
    public function eliminar(){}
}
?>