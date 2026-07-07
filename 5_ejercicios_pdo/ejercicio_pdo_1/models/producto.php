<?php

class Producto{
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    // READ - leer todos los productos
    public function todos() :array{
        // prepara la consulta, devolviendo el statement $stmt
        $stmt = $this->pdo->prepare(
            'SELECT * FROM productos ORDER BY nombre ASC'
        );
        // ejecuta la consulta
        $stmt->execute();
        // obtiene TODOS los resultados como un array
        return $stmt->fetchAll();
    }

    // READ - leer producto por id concreto
    public function por_id(int $id) :?array{
        // el ? del SELECT es un hueco vacío de momento
        $stmt = $this->pdo->prepare(
            'SELECT * FROM productos WHERE id = ?'
        );
        // aquí rellena el ? con el $id
        $stmt->execute([$id]);
        // obtiene el resultado que coincida con el $id
        $p = $stmt->fetch();
        // devuelve el resultado $p o null
        return $p ?: null;
    }

    // CREATE
    public function crear(string $nombre, string $categoria, float $precio, int $stock, string $proveedor) :int{
    // el : indica huecos vacíos con nombre    
    $stmt = $this->pdo->prepare(
            'INSERT INTO productos (nombre, categoria, precio, stock, proveedor)
            VALUES (:nombre, :categoria, :precio, :stock, :proveedor)
            '
        );
        // rellena cada hueco correspondiente
        $stmt->execute(
            [
                ':nombre'=>$nombre,
                ':categoria'=>$categoria,
                ':precio'=>$precio,
                ':stock'=>$stock,
                ':proveedor'=>$proveedor,
            ]
        );
        // devuelve el id del último registro insertado convertido en un int (número entero)
        return (int) $this->pdo->lastInsertId();
    }

    // UPDATE
    public function actualizar(int $id, string $nombre, string $categoria, float $precio, int $stock, string $proveedor) :bool{
        $stmt = $this->pdo->prepare(
            '
            UPDATE productos
            SET nombre = :nombre,
            categoria = :categoria,
            precio = :precio,
            stock = :stock,
            proveedor = :proveedor
            WHERE id = :id
            '
        );
        $stmt->execute(
            [
            ':id'=>$id,
            ':nombre'=>$nombre,
            ':categoria'=>$categoria,
            ':precio'=>$precio,
            ':stock'=>$stock,
            ':proveedor'=>$proveedor
            ]
        );
        return $stmt->rowCount() > 0;
    }

    //DELETE
    public function eliminar(int $id) :bool{
        $stmt = $this->pdo->prepare(
            'DELETE FROM productos WHERE id = ?'
        );
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

}


?>