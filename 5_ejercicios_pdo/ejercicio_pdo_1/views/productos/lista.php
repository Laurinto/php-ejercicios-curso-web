<?php ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Productos
        <span class="badge bg-secondary"><?= count($productos) ?></span>
    </h2>
    <a href="index.php?accion=nuevo" class="btn btn-primary">+ Nuevo</a>
</div>

<?php if (empty($productos)): ?>
    <div class="alert alert-info">No hay productos.</div>
<?php else: ?>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($productos as $p): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($p['nombre']) ?></h5>
                        <p class="badge bg-secondary"><?= htmlspecialchars($p['categoria']) ?></p>
                        <p class="card-text">
                            Precio: <strong><?= $p['precio'] ?>€</strong><br>
                            Stock: <?= $p['stock'] ?> uds.
                        </p>
                    </div>
                    <div class="card-footer d-flex gap-2">
                        <a href="index.php?accion=editar&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                        <a href="index.php?accion=confirmar_eliminar&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-danger ms-auto">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>