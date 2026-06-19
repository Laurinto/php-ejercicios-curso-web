<main>
    <h2>Editar nota</h2>
    <form action="index.php?pagina=notas&accion=actualizar" method="post">
        <input type="hidden" name="id" value="<?= $nota['id'] ?>">
        <section><!--titulo-->
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($nota['titulo'])?>" required>
        </section>
        <section><!--contenido-->
            <label for="titulo">Contenido</label>
            <input type="text" name="contenido" id="contenido" value="<?= htmlspecialchars($nota['contenido'])?>" required>
        </section>
        <section><!--botones-->
            <button type="submit">Guardar cambios</button>
            <a href="index.php?pagina=notas">Cancelar</a>
        </section>
    </form>
</main>