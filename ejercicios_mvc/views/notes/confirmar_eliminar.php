<main>
    <h2>¿Eliminar esta nota</h2>
    <p><strong><?= htmlspecialchars($nota['titulo']) ?></strong></p>
    <p>Esta acción no se puede deshacer.</p>
    <form action="index.php?pagina=notas&accion=eliminar" method="post">
        <input type="hidden" name="id" value="<?= $nota['id'] ?>">
        <button type="submit">Sí, eliminar</button>
        <a href="index.php?pagina=notas">Cancelar</a>
    </form>
</main>