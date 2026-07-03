<?php
// views/notas/ver.php
// $nota viene del Controlador como array asociativo
?>
<article class="nota-detalle">
    <h2><?= htmlspecialchars($nota['titulo']) ?></h2>
    <p class="fecha">Creada el <?= htmlspecialchars($nota['fecha']) ?></p>

    <div class="contenido">
        <?= nl2br(htmlspecialchars($nota['contenido'])) ?>
    </div>

    <div class="acciones">
        <a href="index.php?pagina=notas&accion=editar&id=<?= $nota['id'] ?>">Editar</a>
        <a href="index.php?pagina=notas">← Volver</a>
    </div>
</article>