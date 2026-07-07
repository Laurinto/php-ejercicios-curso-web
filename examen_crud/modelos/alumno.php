<?php
class Alumno{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    // listar TODOS los alumnos
    public function listar() :array{
        // preparar consulta
        $stmt = $this->pdo->prepare(
            '
            SELECT * FROM alumnos; 
            '
        );
        // ejecutar consulta
        $stmt->execute();
        // obtener todos los resultados en un array
        return $stmt->fetchAll();
    }

    // crear UN alumno
    public function crear(string $nombre, string $apellidos, string $email, string $curso) :int{
        // preparar consulta
        $stmt = $this->pdo->prepare(
            '
            INSERT INTO alumnos (nombre, apellidos, email, curso)
            VALUES (:nombre, :apellidos, :email, :curso);
            '
        );
        // ejecutar consulta
        $stmt->execute(
            [
                ':nombre'=>$nombre,
                ':apellidos'=>$apellidos,
                ':email'=>$email,
                ':curso'=>$curso
            ]
        );
        // obtener el id del registro
        return (int)$this->pdo->lastInsertId();
    }
}

?>