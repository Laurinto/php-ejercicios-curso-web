<?php
// declarar variables 
$respuestasCorrecta = [
    "pregunta-1"=>"b",
    "pregunta-2"=>"c",
    "pregunta-3"=>"b",
    "pregunta-4"=>"c",
    "pregunta-5"=>"d",
    "pregunta-6"=>"c"
];
$textoCorrecto = [
    "pregunta-1"=>"Explicación de respuesta correcta 1",
    "pregunta-2"=>"Explicación de respuesta correcta 2",
    "pregunta-3"=>"Explicación de respuesta correcta 3",
    "pregunta-4"=>"Explicación de respuesta correcta 4",
    "pregunta-5"=>"Explicación de respuesta correcta 5",
    "pregunta-6"=>"Explicación de respuesta correcta 6"
    ];

if ($_SERVER["REQUEST_METHOD"]==="POST"){
    // variables sacadas del html
    $respuestas = [
    "pregunta-1"=>$_POST["pregunta-1"]??"",
        "pregunta-2"=>$_POST["pregunta-2"]??"",
        "pregunta-3"=>$_POST["pregunta-3"]??"",
        "pregunta-4"=>$_POST["pregunta-4"]??"",
        "pregunta-5"=>$_POST["pregunta-5"]??"",
        "pregunta-6"=>$_POST["pregunta-6"]??""
    ];

    // validar que las respuestas estén respondidas
    function validarRespuestasNoRespondidas($respuestas){
        $preguntasNoRespondidas=[];
        foreach($respuestas as $pregunta=>$respuesta){
            if ($respuesta === ""){
                $preguntasNoRespondidas[] = $pregunta;
            }
        }
        return $preguntasNoRespondidas;
    }

    $preguntasNoRespondidas = validarRespuestasNoRespondidas($respuestas);

    // generación de puntuación
    $aciertos = 0;
    foreach($respuestasCorrecta as $respuesta=>$respuestaBien){ // recorre todas las respuestas correctas y las llama con el nombre de al lado y su asociado
        $respuestaAlumno = $respuestas[$respuesta];
        if($respuestaAlumno === $respuestaBien){ // compara que cada respuesta de lo que has puesto sea igual a la respuesta correcta
            $aciertos++;
        }
        // mostrar visualmente que la respuesta es correcta

        $esCorrecto = ($respuestaAlumno === $respuestaBien);
        $colorRespuesta = $esCorrecto ? "green" : "red";
        echo 
            "<article style='background:$colorRespuesta'>";
        if (!$esCorrecto){
            echo "respuesta correcta: {$textoCorrecto[$respuesta]}";
        }
        echo "</article>";
    }
    // calcular porcentaje
    $porcentaje = ($aciertos / 6) * 100;

    function tipoResultado($aciertos){
        if ($aciertos == 6){
            return "¡Perfecto";
        }
        elseif ($aciertos >= 4){
            return "¡Muy bien!";
        }
        elseif ($aciertos >= 2){
            return "sigue practicando.";
        }
        else{
        return "Repasa el material.";
        }
    }

    // mostrar salida si es que ha salido correcto
    if (!empty($preguntasNoRespondidas)){
        echo "Hay preguntas sin responder (" . implode(",", $preguntasNoRespondidas) . ").";
        exit();
    }
    else{
        echo
            "<p>Has acertado $aciertos de 6 preguntas ($porcentaje %)."
            . tipoResultado($aciertos) .
            '</p><button onclick="history.back()">VOLVER</button>'
        ;
        
        exit();
    }
}

?>