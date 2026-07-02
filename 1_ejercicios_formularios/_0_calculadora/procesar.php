<?php

// Verificar que el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") { // modo POST
    // recoger datos
    $numero1 = $_POST["numero1"];
    $numero2 = $_POST["numero2"];
    $operacion = $_POST["operacion"];
    
    // sacar operación
    require_once 'operacion.php';
    if ($operacion == "suma"){
        sumar($numero1,$numero2);
    }
    elseif ($operacion == "resta"){
        restar($numero1,$numero2);
    }
    elseif ($operacion == "multiplicacion"){
        multiplicar($numero1,$numero2);
    }
    else{
        dividir($numero1,$numero2);
    }
    echo '
        <section>
        <a href="/ejercicioformulario">Volver</a>
        </section>
    ';
}else{
    echo "Acceso directo no permitido.";
}
?>



