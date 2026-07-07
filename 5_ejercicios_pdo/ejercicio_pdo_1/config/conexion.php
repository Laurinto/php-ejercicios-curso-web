<?php // EDITAR PARA ESTE EJERCICIO

class Conexion{
    private static ?PDO $instancia = null;
    
    public static function obtener(): PDO{
        if (self::$instancia === null){
            // puesto así como prueba únicamente
            $dsn = 'mysql:host=localhost;dbname=ejercicios;user=root;password=36WrvT89;charset=utf8mb4'; // NO COMPARTIR CONTRASEÑAS NUNCA
            self::$instancia = new PDO($dsn, 'root', '36WrvT89', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        }
        return self::$instancia;
    }
}

?>
