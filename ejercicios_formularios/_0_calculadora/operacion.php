<?php
function sumar($numero1,$numero2){
    $resultado = $numero1 + $numero2;
    echo $numero1 . " + " . $numero2 . " = " . $resultado;
    return $resultado;
}
function restar($numero1,$numero2){
    $resultado = $numero1 - $numero2;
    echo $numero1 . " - " . $numero2 . " = " . $resultado;
    return $resultado;
}
function multiplicar($numero1,$numero2){
    $resultado = $numero1 * $numero2;
    echo $numero1 . " x " . $numero2 . " = " . $resultado;
    return $resultado;
}
function dividir($numero1,$numero2){
    $resultado = $numero1 / $numero2;
    echo $numero1 . " / " . $numero2 . " = " . $resultado;
    return $resultado;
}
?>