<main>
    <h2><?= htmlspecialchars($nota['titulo']) ?></h2>
    <p>Creada el <?= htmlspecialchars($nota['fecha']) ?></p>
    <section>
        <?= n12br(htmlspecialchars($nota['contenido'])) ?> <!--esto hay que mirar que está mal-->
    </section>
    <section>
        <a href="index.php?pagina=notas&accion=editar$id=<?= $nota[$id] ?>">Editar</a>
        <a href="index.php?pagina=notas">Volver</a>
    </section>
</main>