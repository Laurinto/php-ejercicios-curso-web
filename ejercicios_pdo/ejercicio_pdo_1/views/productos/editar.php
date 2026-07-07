<?php // views/productos/editar.php ?>
<div style="max-width: 600px; margin: 0 auto;">
    <h2>Editar producto</h2>
    <form method="POST" action="index.php?accion=actualizar">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">
        
        <div style="margin-bottom: 15px;">
            <label>Nombre *</label>
            <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required style="width: 100%; padding: 8px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label>Categoría *</label>
            <input type="text" name="categoria" value="<?= htmlspecialchars($producto['categoria']) ?>" required style="width: 100%; padding: 8px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label>Precio (€) *</label>
            <input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" required min="0.01" style="width: 100%; padding: 8px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label>Stock</label>
            <input type="number" name="stock" value="<?= $producto['stock'] ?>" style="width: 100%; padding: 8px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label>Proveedor</label>
            <input type="text" name="proveedor" value="<?= htmlspecialchars($producto['proveedor']) ?>" style="width: 100%; padding: 8px;">
        </div>
        
        <div style="margin-top: 20px;">
            <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer;">Guardar</button>
            <a href="index.php" style="padding: 10px 20px; background-color: #6c757d; color: white; text-decoration: none; display: inline-block; margin-left: 10px;">Cancelar</a>
        </div>
    </form>
</div>