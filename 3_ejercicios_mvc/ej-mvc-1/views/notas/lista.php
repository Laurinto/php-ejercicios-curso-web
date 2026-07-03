<?php
// views/notas/lista.php
// $notas viene del Controlador como array de arrays
?>
<h2>Mis notas (<?= count($notas) ?>)</h2>

<?php if (empty($notas)): ?>
    <p class="vacio">
        No tienes notas todavía.
        <a href="index.php?pagina=notas&accion=nuevo">Crea la primera</a>.
    </p>
<?php else: ?>
    <div class="notas-grid">
        <?php foreach ($notas as $nota): ?>
            <div class="tarjeta">
                <h3><?= htmlspecialchars($nota['titulo']) ?></h3>
                <p class="fecha"><?= htmlspecialchars($nota['fecha']) ?></p>
                <div class="acciones">
                    <a href="index.php?pagina=notas&accion=ver&id=<?= $nota['id'] ?>">Ver</a>
                    <a href="index.php?pagina=notas&accion=editar&id=<?= $nota['id'] ?>">Editar</a>
                    <a href="index.php?pagina=notas&accion=confirmar_eliminar&id=<?= $nota['id'] ?>" class="eliminar">Eliminar</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>