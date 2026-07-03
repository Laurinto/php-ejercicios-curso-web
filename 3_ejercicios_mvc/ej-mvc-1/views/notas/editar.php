<?php
// views/notas/editar.php
// $nota viene del Controlador con los datos actuales pre-rellenos
?>
<h2>Editar nota</h2>

<form method="POST" action="index.php?pagina=notas&accion=actualizar">
    <!-- Campo oculto: el id de la nota que estamos editando -->
    <input type="hidden" name="id" value="<?= $nota['id'] ?>">

    <div class="campo">
        <label for="titulo">Título *</label>
        <input type="text" id="titulo" name="titulo" required value="<?= htmlspecialchars($nota['titulo']) ?>">
    </div>

    <div class="campo">
        <label for="contenido">Contenido</label>
        <textarea id="contenido" name="contenido" rows="8"><?= htmlspecialchars($nota['contenido']) ?></textarea>
    </div>

    <div class="botones">
        <button type="submit">Guardar cambios</button>
        <a href="index.php?pagina=notas">Cancelar</a>
    </div>
</form>