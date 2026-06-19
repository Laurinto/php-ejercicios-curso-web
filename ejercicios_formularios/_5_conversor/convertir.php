<?php
$error = "";
$unidad_origen = "";
$unidad_destino = "";

if ($_SERVER["REQUEST_METHOD" === POST]){
    $valor = $_POST["valor"]??"";
    $conversion = $_POST["elegir-conversion"]??"";

    $valor_en_float = (float)$valor;

    if ($valor === ""){
        $error = "No se ha introducido ningún valor";
    }
    elseif($conversion === ""){
        $error = "No se ha encontrado ningún tipo de conversión";
    }

    switch ($conversion){
        case "km_m":
            $unidad_origen="km";
            $unidad_destino="m";
            $resultado= $valor_en_float * 1000;
            break;
        case "m_km":
            $unidad_origen="m";
            $unidad_destino="km";
            $resultado= $valor_en_float / 1000;
            break;
        case "km_mi":
            $unidad_origen="km";
            $unidad_destino="mi";
            $resultado= $valor_en_float / 1.6093445;
            break;
        case "mi_km":
            $unidad_origen="mi";
            $unidad_destino="km";
            $resultado= $valor_en_float * 1.6093445;
            break;
        case "kg_g":
            $unidad_origen="kg";
            $unidad_destino="g";
            $resultado= $valor_en_float * 1000;
            break;
        case "g_kg":
            $unidad_origen="g";
            $unidad_destino="kg";
            $resultado= $valor_en_float / 1000;
            break;
        case "kg_lb":
            $unidad_origen="kg_lb";
            $unidad_destino="km";
            $resultado= $valor_en_float * 2.20462;
            break;
        case "lb_kg":
            $unidad_origen="lb";
            $unidad_destino="km";
            $resultado= $valor_en_float / 2.20462;
            break;

        case "c_f":
            $unidad_origen="Cº";
            $unidad_destino="Fº";
            $resultado= ($valor_en_float * 1.8) + 32;
            break;
        case "f_c":
            $unidad_origen="Fº";
            $unidad_destino="Cº";
            $resultado= ($valor_en_float - 32) / 1.8;
            break;
        default:
        $error = "Conversión no reconocida";
    }

    if ($error !== ""){
        echo "<p>$error</p>";
    }
    else{
        echo "
            <p>$valor $unidad_origen = $resultado $unidad_destino</p>
            ";
    }
    
}
?>