<!--

// --- Base de datos (PRODUCCIÓN) ---
$bd_host = 'localhost'; // casi siempre 'localhost' en el hosting
$bd_nombre = 'usuario_libro'; // nombre exacto que te da el panel
$bd_user = 'usuario_libro';
$bd_pass = 'tu-clave-de-bd';

$pdo = new PDO(
    "mysql:host=$bd_host;dbname=$bd_nombre;charset=utf8mb4",
    $bd_user,
    $bd_pass
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// --- Correo saliente (SMTP) ---
define('SMTP_HOST', 'smtp.tudominio.com');
define('SMTP_PORT', 587); // TLS
define('SMTP_USER', 'no-responder@tudominio.com');
define('SMTP_PASS', 'tu-clave-de-correo');
define('SMTP_DEST', 'admin@tudominio.com'); // quién recibe el aviso

-->