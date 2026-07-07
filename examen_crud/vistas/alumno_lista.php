<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="mx p-3">
    <main>
        <section>
            <a href="index.php?accion=crear">Nuevo alumno</a>
        </section>
        <section>
                <table class="table">
                    <!--meter la tabla con las cosas-->
                    <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Curso</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($alumnos as $al): ?>
                        <tr>
                            <th><?= htmlspecialchars($al['nombre']) ?></th>
                            <th><?= htmlspecialchars($al['apellidos']) ?></th>
                            <th><?= htmlspecialchars($al['email']) ?></th>
                            <th><?= htmlspecialchars($al['curso']) ?></th>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </section>
    </main>

    <script src"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>