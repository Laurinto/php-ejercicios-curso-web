<?php
$nombre = "Laura";
$apellido = "Uzar";
$edad = 22;
$altura = 1.67;
$esEstudiante = true;


// ver tipo de dato:
// gettype()
// var_dump()

// constante --> const nombre_variable;

echo "$nombre $apellido, $edad años, $altura m de altura.";

if ($esEstudiante){
        echo "sí es estudante.";
    }
    else{
        echo "no es estudiante.";
    }

$aniosPorJubilarse = 67 - $edad;
echo "le quedan $aniosPorJubilarse años para jubilarse";

const IVA = 0.21;
$producto1 = 5.95;
$producto2 = 3.4;
$producto3 = 1.5;
$total = $producto1 + $producto2 + $producto3;
$totalIVA = $total * IVA;
$totalFinal = $total + $totalIVA;
echo "PRECIO CON IVA --> $totalFinal €";

var_dump($nombre, $apellido, $edad, $altura, $esEstudiante, $aniosPorJubilarse, IVA, $totalFinal)
?>