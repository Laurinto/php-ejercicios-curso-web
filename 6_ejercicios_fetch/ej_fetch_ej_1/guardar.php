<?php
header('Content-Type:application/json');

$nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
$email = filter_var(trim($_POST['email']??''), FILTER_SANITIZE_EMAIL);


?>