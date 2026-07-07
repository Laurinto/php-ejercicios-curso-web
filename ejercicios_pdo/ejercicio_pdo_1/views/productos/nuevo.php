<?php ?>
<div class="row justify-content-center">
    <div class="col-12 col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white fw-bold">Nuevo producto</div>
            <div class="card-body">
                <form method="POST" action="index.php?accion=crear">
                    <div class="mb-3">
                        <label class="form-label">Nombre *</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoría *</label>
                        <input type="text" class="form-control" name="categoria" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio (€) *</label>
                        <input type="number" step="0.01" class="form-control" name="precio" required min="0.01">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input type="number" class="form-control" name="stock" value="0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Proveedor</label>
                        <input type="text" class="form-control" name="proveedor">
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>