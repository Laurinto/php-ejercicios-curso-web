<?php
// views/notas/confirmar_eliminar.php
?>
<div class="confirmar">
    <h2>¿Eliminar esta nota?</h2>
    <p><strong><?= htmlspecialchars($nota['titulo']) ?></strong></p>
    <p class="aviso">Esta acción no se puede deshacer.</p>

    <form method="POST" action="index.php?pagina=notas&accion=eliminar">
        <input type="hidden" name="id" value="<?= $nota['id'] ?>">
        <button type="submit" class="btn-eliminar">Sí, eliminar</button>
        <a href="index.php?pagina=notas">Cancelar</a>
    </form>
</div>