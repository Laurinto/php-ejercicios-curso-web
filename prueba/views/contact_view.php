<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <!-- Carga de Bootstrap 5 desde CDN sin necesidad de descargar librerías locales -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-light text-dark">

    <!-- Contenedor centrado con ancho máximo idéntico al diseño anterior (600px) -->
    <div class="container px-3 my-5" style="max-width: 600px;">

        <h1 class="mb-4 fw-bold">Contacto</h1>

        <!-- Mostrar mensaje de éxito si la validación en servidor fue correcta -->
        <?php if (!empty($mensajeExito)): ?>
            <div class="alert alert-success mb-4" role="alert">
                <?= htmlspecialchars($mensajeExito, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <!-- Mostrar error general (por ejemplo, si falla el servidor SMTP en mail()) -->
        <?php if (!empty($errores['general'])): ?>
            <div class="alert alert-danger mb-4" role="alert">
                <?= htmlspecialchars($errores['general'], ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <!-- Formulario de contacto mantenido accesible con labels asociadas -->
        <form action="" method="POST" novalidate>
            
            <!-- Campo Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label fw-semibold">Nombre completo *</label>
                <input 
                    type="text" 
                    id="nombre" 
                    name="nombre" 
                    class="form-control <?= isset($errores['nombre']) ? 'is-invalid' : '' ?>"
                    value="<?= htmlspecialchars($datos['nombre'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                    aria-describedby="<?= isset($errores['nombre']) ? 'error-nombre' : '' ?>"
                    required
                >
                <?php if (isset($errores['nombre'])): ?>
                    <div id="error-nombre" class="invalid-feedback"><?= htmlspecialchars($errores['nombre'], ENT_QUOTES, 'UTF-8') ?></div>
                <?php endif; ?>
            </div>

            <!-- Campo Email -->
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Correo electrónico *</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control <?= isset($errores['email']) ? 'is-invalid' : '' ?>"
                    value="<?= htmlspecialchars($datos['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                    aria-describedby="<?= isset($errores['email']) ? 'error-email' : '' ?>"
                    required
                >
                <?php if (isset($errores['email'])): ?>
                    <div id="error-email" class="invalid-feedback"><?= htmlspecialchars($errores['email'], ENT_QUOTES, 'UTF-8') ?></div>
                <?php endif; ?>
            </div>

            <!-- Campo Mensaje -->
            <div class="mb-3">
                <label for="mensaje" class="form-label fw-semibold">Mensaje (10 a 500 caracteres) *</label>
                <textarea 
                    id="mensaje" 
                    name="mensaje" 
                    rows="4"
                    class="form-control <?= isset($errores['mensaje']) ? 'is-invalid' : '' ?>"
                    aria-describedby="<?= isset($errores['mensaje']) ? 'error-mensaje' : '' ?>"
                    required
                ><?= htmlspecialchars($datos['mensaje'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                <?php if (isset($errores['mensaje'])): ?>
                    <div id="error-mensaje" class="invalid-feedback"><?= htmlspecialchars($errores['mensaje'], ENT_QUOTES, 'UTF-8') ?></div>
                <?php endif; ?>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary px-4 py-2 fw-medium">Enviar mensaje</button>

        </form>

    </div>

</body>
</html>

