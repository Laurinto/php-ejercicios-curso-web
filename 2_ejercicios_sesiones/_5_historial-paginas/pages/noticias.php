<?php
session_start();

$pagina_actual = 'Noticias';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
</head>
<body>
    <h1>Sección de noticias</h1>
    <section>
        <h2>Noticia 1</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat quam, iste veritatis quos, nihil distinctio facilis voluptates fuga ducimus velit, non expedita nobis dolorem exercitationem officiis quis. Laboriosam, suscipit incidunt?</p>
    </section>
    <section>
        <h2>Noticia 2</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat quam, iste veritatis quos, nihil distinctio facilis voluptates fuga ducimus velit, non expedita nobis dolorem exercitationem officiis quis. Laboriosam, suscipit incidunt?</p>
    </section>
    <section>
        <h2>Noticia 3</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat quam, iste veritatis quos, nihil distinctio facilis voluptates fuga ducimus velit, non expedita nobis dolorem exercitationem officiis quis. Laboriosam, suscipit incidunt?</p>
    </section>
    <?php include_once '../components/historial.php' ?>
    <?php include_once '../components/footer.php' ?>
</body>
</html>