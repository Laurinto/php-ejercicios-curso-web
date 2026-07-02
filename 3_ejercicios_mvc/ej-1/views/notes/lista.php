<main>
    <h2>Mis notas(<?= count($notas) ?>)</h2>
    <?php if (empty($notas)):?>
        <>No tienes notas creadas, <a href="index.php?pagina=notas&accion=nuevo">crea la primera.</a></p>
    <?php else: ?>
        <?php foreach($notas as $nota):?> <!--recoge todas las notas-->
            <section>
                <h3><?= htmlspecialchars($nota['titulo']) ?></h3>
                <p><?= htmlspecialchars($nota['fecha']) ?></p>
                <div>
                    <a href="index.php?pagina=notas&accion=ver">Ver</a>
                    <a href="index.php?pagina=notas&accion=editar">Editar</a>
                    <a href="index.php?pagina=notas&accion=confirmar_eliminar">Eliminar</a>
                </div>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>
</main>