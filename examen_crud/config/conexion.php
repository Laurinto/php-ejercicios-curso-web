<?php
class Conexion{
    private static ?PDO $instancia = null;
    
    public static function obtener(): PDO{
        if (self::$instancia === null){
            $dsn = 'mysql:host=localhost;dbname=examen_crud;user=root;password=root;charset=utf8mb4';
            self::$instancia = new PDO($dsn, 'root', 'root', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        }
        return self::$instancia;
    }
}
?>