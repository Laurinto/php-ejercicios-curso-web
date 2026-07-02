<?php
if (!isset($_SESSION['historial'])){
    $_SESSION['historial'] = [];
}

$_SESSION['historial'][] = [
    'pagina' => $pagina_actual,
    'hora' => date('H:i:s'),
    'url' => basename($_SERVER['PHP_SELF']) // https://www.php.net/manual/es/function.basename.php
];

if (count($_SESSION['historial']) > 20){ // máximo 20 entradas, la más antigua se eliminará
    $_SESSION['historial'] = array_slice($_SESSION['historial'],-20);
}
// El bloque solo muestra las 5 más recientes
$ultimas = array_slice($_SESSION['historial'],-5, null, true);
$ultimas = array_reverse($ultimas);
// - Sin historial ("Aún no has visitado ninguna página en esta sesión")
?>

<aside>
    <h2>Historial:</h2>
    <?php
    if(empty($_SESSION['historial'])){
        echo "<p>No hay nada en el historial</p>";
        exit;
    }
    foreach($ultimas as $i => $elemento){
        echo "<h3>" . ($i+1). " --> " . $elemento['pagina'] . "</h3>";
        echo "<p>" . $elemento['url'] . " - ". $elemento['hora'] . "</p>";
    }
    ?>
</aside>