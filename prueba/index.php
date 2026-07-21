<?php

declare(strict_types=1);

require_once __DIR__ . '/ContactController.php';

// Instanciar y ejecutar el controlador
$controller = new ContactController();
$controller->handleRequest();
