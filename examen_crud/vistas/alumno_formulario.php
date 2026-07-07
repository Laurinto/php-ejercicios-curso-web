<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="mx p-3">
    <main>
        <form action="index.php?accion=crear" method="post">
            <section>
                <label>Nombre</label>
                <input type="text" name="nombre" required>
            </section>
            <section>
                <label>Apellidos</label>
                <input type="text" name="apellidos" required>
            </section>
            <section>
                <label>Email</label>
                <input type="text" name="email" required>
            </section>
            <section>
                <label>Curso</label>
                <input type="text" name="curso" required>
            </section>
            <section>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
            </section>
        </form>
    </main>
    
    <script src"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>