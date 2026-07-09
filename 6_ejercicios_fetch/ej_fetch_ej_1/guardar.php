<?php
header('Content-Type:application/json');

// genera la respuesta
$nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
$email = filter_var(trim($_POST['email']??''), FILTER_SANITIZE_EMAIL);

// convertir a JSON para que JS lo pueda leer, ya tenga error o no
// error de datos inválidos
if (empty($nombre) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode(['ok'=>false,'error'=>'Datos inválidos']);
    exit;
}

// guarda en el fichero JSON (aunque de normal se guarda en el PDO)
$archivo = 'contactos.json';
$contactos = file_exists($arvhivo) ? json_decode(file_get_contents($archivo),true) : [];

$contactos[] = ['nombre'=>$nombre,'email'=>$email];
file_put_contents($archivo,json_encode($contactos,JSON_PRETTY_PRINT));
echo json_encode(['ok'=>true,'mensaje'=>'Contacto guardado']);
?>