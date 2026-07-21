<?php

declare(strict_types=1);

/**
 * Controlador de Contacto (Patrón MVC sin frameworks)
 * Desarrollado bajo estándares PHP 8.
 */
class ContactController
{
    /**
     * Procesa la petición HTTP del usuario y gestiona la validación y envío seguro de correo.
     */
    public function handleRequest(): void
    {
        // Inicialización de variables para la vista
        $errores = [];
        $datos = [
            'nombre'  => '',
            'email'   => '',
            'mensaje' => ''
        ];
        $mensajeExito = '';

        // Verificar si el formulario se envió mediante el método POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Sanitización previa y lectura de datos eliminando espacios innecesarios
            $datos['nombre']  = trim($_POST['nombre'] ?? '');
            $datos['email']   = trim($_POST['email'] ?? '');
            $datos['mensaje'] = trim($_POST['mensaje'] ?? '');

            // 1. Validación del campo Nombre (Obligatorio)
            if (empty($datos['nombre'])) {
                $errores['nombre'] = 'El nombre es obligatorio.';
            }

            // 2. Validación del campo Email (Obligatorio y formato válido mediante filter_var)
            if (empty($datos['email'])) {
                $errores['email'] = 'El correo electrónico es obligatorio.';
            } elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
                $errores['email'] = 'Introduce una dirección de correo electrónico válida.';
            }

            // 3. Validación del campo Mensaje (Obligatorio y longitud entre 10 y 500 caracteres)
            $longitudMensaje = mb_strlen($datos['mensaje']);
            if (empty($datos['mensaje'])) {
                $errores['mensaje'] = 'El mensaje es obligatorio.';
            } elseif ($longitudMensaje < 10 || $longitudMensaje > 500) {
                $errores['mensaje'] = 'El mensaje debe tener entre 10 y 500 caracteres (actual: ' . $longitudMensaje . ').';
            }

            // Si el array de errores está vacío, procedemos al envío seguro del correo
            if (empty($errores)) {
                $enviado = $this->enviarCorreoSeguro($datos);

                if ($enviado) {
                    $mensajeExito = '¡Gracias! Tu mensaje ha sido enviado correctamente por correo electrónico.';
                    // Limpiar los datos del formulario tras el éxito
                    $datos = ['nombre' => '', 'email' => '', 'mensaje' => ''];
                } else {
                    // Mensaje genérico de error si la función mail() del servidor no responde
                    $errores['general'] = 'Ocurrió un problema al enviar el correo. Por favor, inténtalo más tarde.';
                }
            }
        }

        // Cargar la vista pasándole las variables ($errores, $datos, $mensajeExito)
        require __DIR__ . '/views/contact_view.php';
    }

    /**
     * Envía un correo electrónico utilizando mail() aplicando medidas de seguridad avanzadas:
     * - Prevención de Inyección de Cabeceras (Header Injection / CRLF).
     * - Cumplimiento de políticas DMARC/SPF usando un remitente propio del servidor ('From').
     * - Asignación del correo del usuario como 'Reply-To' para permitir respuestas sin suplantación.
     * - Codificación UTF-8 para evitar errores de caracteres especiales.
     */
    private function enviarCorreoSeguro(array $datos): bool
    {
        // 1. Definir el destinatario (correo de la administración de la web)
        $destinatario = 'admin@midominio.com';

        // 2. Limpieza estricta de saltos de línea (\r, \n) para evitar Email Header Injection
        $nombreLimpio  = $this->sanearCabecera($datos['nombre']);
        $emailLimpio   = $this->sanearCabecera($datos['email']);
        $asunto        = 'Nuevo mensaje de contacto de: ' . $nombreLimpio;

        // 3. Construcción del cuerpo del mensaje en texto plano
        $cuerpo  = "Has recibido un nuevo mensaje desde el formulario de contacto:\n\n";
        $cuerpo .= "Nombre: " . $nombreLimpio . "\n";
        $cuerpo .= "Email de contacto: " . $emailLimpio . "\n";
        $cuerpo .= "Fecha/Hora: " . date('Y-m-d H:i:s') . "\n\n";
        $cuerpo .= "Mensaje:\n" . $datos['mensaje'] . "\n";

        // 4. Configuración de cabeceras seguras (formato cadena CRLF para compatibilidad total en Windows/SMTP)
        $hostServidor = $_SERVER['SERVER_NAME'] ?? 'localhost';
        $remitenteServidor = 'no-reply@' . preg_replace('/^www\./', '', $hostServidor);

        $cabecerasTexto  = "From: Formulario Web <{$remitenteServidor}>\r\n";
        $cabecerasTexto .= "Reply-To: {$nombreLimpio} <{$emailLimpio}>\r\n";
        $cabecerasTexto .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $cabecerasTexto .= "Content-Transfer-Encoding: 8bit\r\n";
        $cabecerasTexto .= "X-Mailer: PHP/" . phpversion();

        // 5. Ejecutar mail()
        return mail($destinatario, $asunto, $cuerpo, $cabecerasTexto);
    }

    /**
     * Elimina cualquier carácter de salto de línea (\r, \n) o caracteres nulos (%00)
     * para prevenir ataques de Inyección de Cabeceras HTTP/SMTP.
     */
    private function sanearCabecera(string $valor): string
    {
        return trim(preg_replace('/[\r\n\0]/', '', $valor));
    }
}
