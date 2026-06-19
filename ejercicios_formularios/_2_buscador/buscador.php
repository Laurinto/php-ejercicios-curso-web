<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 2 - Buscador</title>
</head>
<body>
    <form method="get">
        <label for="q">Busca...</label>
        <input type="text" name="texto-entrada" id="q">
        <button type="submit">BUSCA</button>
    </form>
    <section>
        <ul>
            <?php
    $paises = [
"Alemania", "Argentina", "Australia", "Brasil", "Canada",
"Chile", "China", "Colombia", "Espana", "Francia",
"Grecia", "India", "Italia", "Japon", "Mexico",
"Nigeria", "Peru", "Polonia", "Portugal", "Reino Unido",
"Rusia", "Sudafrica", "Turquia", "Uruguay", "Venezuela",
];

if ($_SERVER["REQUEST_METHOD"] ==="GET"){
    $busqueda = trim($_GET["texto-entrada"]?? "");
    // si $busqueda está vacío, $resultados = $paises; (todos).
    $resultado =[];
    
    if ($busqueda === ""){
        $resultado = $paises;
    }
    else{
        foreach($paises as $pais){
            if (stripos($pais,$busqueda) !== false){ // mostrar si el elemento del array es igual a lo escrito
                $resultado[] = $pais;
                echo "<li>$pais</li>";
            }
        
        }
        if(count($resultado) === 0){
            echo "No se encontraron países.";
        }
    }
}
    

    ?>
        </ul>
    </section>
</body>
</html>