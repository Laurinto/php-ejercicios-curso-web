<?php
class Libro{
    //propiedades
    public string $titulo;
    public string $autor;
    public int $paginas;
    public bool $estar_disponible;
    public int $disponibles;

    // métodos
    public function resumen(): string {
        return "{$this->titulo} de {$this->autor} ({$this->paginas} páginas)";
    }

    public function prestar(): void {
        $this->estar_disponible = false;
    }
    public function devolver(): void {
        $this->estar_disponible = true;
    }

    public function estado(): string {
        if ($this->estar_disponible === true){
            return "Disponible";
        }
        else{
            return "Prestado";
        }
    }

    public static function contar_disponibles(array $biblioteca) {
        $disponibles = 0;
        foreach ($biblioteca as $l) {
            if($l->estar_disponible){
                $disponibles++;
            }
        }
        return $disponibles;
    }
    
}
$l1= new Libro();
$l1->titulo='Magnifica Humanitas';
$l1->autor='Robert Prevost';
$l1->paginas=256;

$l2= new Libro();
$l2->titulo='Por si un día volvemos';
$l2->autor='María Dueñas';
$l2->paginas=347;

$l3= new Libro();
$l3->titulo='Matar a un rico';
$l3->autor='Sandrone Dazieri';
$l3->paginas=168;

$l4= new Libro();
$l4->titulo='Dormir cuando no puedes dormir';
$l4->autor='Rafael Santandreu';
$l4->paginas=129;

$biblioteca = [$l1,$l2,$l3,$l4];

$l1->prestar();
$l2->devolver();
$l3->devolver();
$l4->prestar();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamo de libros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1>Préstamo de libros</h1>
    </header>
    <main>
        <table class="table table-striped-columns">
            <tr>
                <th>Resumen</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Páginas</th>
                <th>disponibilidad</th>
            </tr>
        <?php foreach ($biblioteca as $libro): ?>
            <tr class="<?= $libro->estar_disponible ? 'table-success':'table-danger' ?>">
                <td><?= htmlspecialchars($libro->resumen()) ?></td>
                <td><?= htmlspecialchars($libro->titulo) ?></td>
                <td><?= htmlspecialchars($libro->autor) ?></td>
                <td><?= htmlspecialchars($libro->paginas) ?></td>
                <td class="<?= $libro->estar_disponible ?>"> <!--REVISAR-->
                    <?= $libro->estado() ?>
                </td>
            <tr>
        <?php endforeach; ?>
        </table>
            <p>Disponibles: <?= Libro::contar_disponibles($biblioteca) ?></p>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

<!--
enlace local -> localhost/php-ejercicios-curso-web/ejercicios_poo/ej-poo-1/ej-poo-1.php
-->