<?php
// clase usuario con datos comunes
// metodo permisos con comportamiento propio

// clase principal
class Usuario{
    // meter elementos protegidos
    protected string $nombre;
    protected string $rol;

    public function __construct(string $nombre, string $rol){
        $this->nombre = $nombre;
        $this->rol = $rol;
    }

    // saca los elementos protegidos
    public function getNombre() :string{
        return $this->nombre;
    }
    public function getRol() :string{
        return $this->rol;
    }

    // sacar frase de presentación
    public function presentar() :string{
        return "Hola, soy {$this->nombre}, mi rol es {$this->rol}.";
    }
    // sacar frase del permiso
    public function permisos() :string{
        return "{$this->nombre} tiene permisos básicos de {$this->rol}.";
    }
}

//subclases
class Administrador extends Usuario{
    // saca el construct de su padre
    public function __construct(string $nombre){
        parent::__construct($nombre, 'administrador');
    }
    // sacar frase del permiso
    public function permisos() :string{
        return "{$this->nombre}: acceso total - ver, crear, editar, eliminar, gestionar.";
    }
    // sacar función exclusiva del administrador
    public function gestionarUsuarios() :string{
        return "{$this->nombre} está gestionando usuarios del sistema.";
    }
}
class Editor extends Usuario{
    // saca el construct de su padre
    public function __construct(string $nombre){
        parent::__construct($nombre, 'editor');
    }
    // sacar frase del permiso
    public function permisos() :string{
        return "{$this->nombre}: puede ver, crear, editar. No puede eliminar.";
    }
}
class Lector extends Usuario{
    // saca el construct de su padre
    public function __construct(string $nombre){
        parent::__construct($nombre, 'lector');
    }
    // sacar frase del permiso
    public function permisos() :string{
        return "{$this->nombre}: solo puede ver contenidos. Sin escritura.";
    }
}

// lista de usuarios
$usuarios = [
    new Administrador('Ana'),
    new Editor('Antonio'),
    new Editor('Jorge'),
    new Lector('Belén'),
    new Lector('Sara')
];

// RESULTADOS
// mostrar distintos resultados con una misma clase en común, pero distintas subclases
foreach ($usuarios as $u){
    echo $u->presentar() . PHP_EOL;
    echo $u->permisos() . PHP_EOL;
    echo PHP_EOL;
}

// bloque para los de clase administrador únicamente -> usa instanceof
echo 'Panel de administración' . PHP_EOL;
foreach($usuarios as $u){
    if ($u instanceof Administrador){ // verifica si la parte del array pertenece a la clase Administrador 
        echo $u->gestionarUsuarios() . PHP_EOL;
    }
}
?>

<!--
enlace: localhost/php-ejercicios-curso-web/4_ejercicios_poo/ej-poo-5/ej-poo-5.php
-->