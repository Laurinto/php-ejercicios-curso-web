<?php

$numero = 7;
echo "<h2>Tabla de multiplicar del $numero</h2>";
for($i = 1; $i<=10; $i++){
    $multiplicar = $numero * $i; 
    echo "<p>$numero x $i = $multiplicar</p>";
}


echo "<h2>Paises y capitales</h2>";
$paisesYCapitales = [
    "España" => "Madrid",
    "Francia" => "Paris",
    "Polonia" => "Varsovia",
    "Italia" => "Roma",
    "Alemania" => "Berlín"
];

$contador = 0;
foreach ($paisesYCapitales as $pais => $capital){
        if ($contador % 2 == 0){
            echo '<p class="coloreado">Pais:' . $pais . ', capital: '. $capital. '</p>';
        }
        else{
            echo "<p>Pais: $pais, capital: $capital</p>";
        }
        $contador++;
    
}

$estacion = date("F");

switch ($estacion){
    case "March​":
    case "march​":
    case "April":
    case "april":
    case "May":
    case "may":
        echo "<p> Primavera🌻</p>";
        break;
    case "June":
    case "june":
    case "July":
    case "july":
    case "August":
    case "august":
        echo "<p>🏝️</p>​";
        break;
    case "September":
    case "september":
    case "October":
    case "october":
    case "November":
    case "november":
        echo "<p>🍂</p>";
        break;
    case "December":
    case "december":
    case "January":
    case "january":
    case "February":
    case "february":
        echo "<p>❄️ Invierno</p>​";
        break;
    default:
        echo "fecha no existente";
}

    
?>

<style>
    .coloreado{
        color: red;
    }
</style>