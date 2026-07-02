<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 1</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"]==="POST"){
        $num = (int)($_POST["numero"]);
        
        $esPar;
        if ($num % 2 === 0){
            $esPar = "par";
        }
        else{
            $esPar = "impar";
        }

        $signo;
        if ($num > 0){ // si el numero es positivo
            $signo = "es un numero positivo";
        }
        else if($num < 0){ //si num negativo
            $signo = "es un numero negativo";
        }
        else{
            $signo = "ni es numero positivo ni negativo, es cero";
        }
        echo "
            <p>El número $num es $esPar y $signo.</p>
        ";
    }
    
    ?>
    <section>
        <h1>¿Par o impar? ¿Positivo o negativo?</h1>
        <form method="post">
            <label for="numero"></label>
            <input type="number" name="numero" id="numero" required>
            <button type="submit">VER</button>
        </form>
    </section>
</body>
</html>