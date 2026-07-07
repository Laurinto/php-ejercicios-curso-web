<?php ?>
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card border-danger shadow-sm">
            <div class="card-header bg-danger text-white fw-bold">⚠️ Confirmar eliminación</div>
            <div class="card-body text-center py-4">
                <p class="fs-5 mb-1">¿Eliminar el producto?</p>
                <p class="fw-bold fs-4">"<?= htmlspecialchars($producto['nombre']) ?>"</p>
                <div class="alert alert-warning">
                    Esta acción <strong>no se puede deshacer</strong>.
                </div>
            </div>
            <div class="card-footer d-flex gap-3 justify-content-center">
                <form method="POST" action="index.php?accion=eliminar">
                    <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                    <button type="submit" class="btn btn-danger px-4">Sí, eliminar</button>
                </form>
                <a href="index.php" class="btn btn-outline-secondary px-4">Cancelar</a>
            </div>
        </div>
    </div>
</div>