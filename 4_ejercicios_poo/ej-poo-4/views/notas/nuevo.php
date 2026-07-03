<?php
// views/notas/nuevo.php
?>
<h2>Nueva nota</h2>

<form method="POST" action="index.php?pagina=notas&accion=crear">
    <div class="campo">
        <label for="titulo">Título *</label>
        <input type="text" id="titulo" name="titulo" required placeholder="Título de la nota">
    </div>

    <div class="campo">
        <label for="contenido">Contenido</label>
        <textarea id="contenido" name="contenido" rows="8" placeholder="Escribe aquí tu nota..."></textarea>
    </div>

    <div class="botones">
        <button type="submit">Guardar nota</button>
        <a href="index.php?pagina=notas">Cancelar</a>
    </div>
</form>