<main>
    <h2></h2>
    <form action="index.php=?pagina=notas&accion=crear" method="post">
        <section>
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" placeholder="Título de la nota" required >
        </section>
        <section>
            <label for="contenido">Contenido</label>
            <textarea name="contenido" id="contenido" placeholder="Escribe aquí tu nota"></textarea>
        </section>
        <section>
            <button type="submit"></button>
            <a href="index.php?pagina=notas">Cancelar</a>
        </section>
    </form>
</main>