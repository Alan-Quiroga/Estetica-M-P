<?php
/**
* Formulario de contacto para Estética M&P
*/

// Email de recepción
$receiving_email_address = 'centroesteticamyp@gmail.com';

// Ruta a la librería PHP Email Form
$php_email_form_path = __DIR__ . '/../assets/vendor/php-email-form/php-email-form.php';

if (file_exists($php_email_form_path)) {
    include($php_email_form_path);
} else {
    die('Error: No se encontró la librería PHP Email Form en: ' . $php_email_form_path);
}

// Inicializar el objeto de contacto
$contact = new PHP_Email_Form;
$contact->ajax = true;
$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : 'Cliente web';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : 'no-reply@esteticamyp.com.ar';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'Consulta desde el sitio web';

// Configuración SMTP (recomendado para mejor entrega)
/*
$contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'centroesteticamyp@gmail.com',
    'password' => 'tu_contraseña_de_aplicacion',
    'port' => '587',
    'encryption' => 'tls'
);
*/

// Protección contra bots (honeypot)
if (!empty($_POST['honeypot'])) {
    die(); // Bot detectado, no procesar
}

// Agregar los campos del formulario al mensaje
$contact->add_message(isset($_POST['name']) ? $_POST['name'] : '', 'Nombre');
$contact->add_message(isset($_POST['email']) ? $_POST['email'] : '', 'Email');
$contact->add_message(isset($_POST['subject']) ? $_POST['subject'] : '', 'Asunto');
$contact->add_message(isset($_POST['message']) ? $_POST['message'] : '', 'Mensaje', 10);

// Información adicional sobre el cliente
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$contact->add_message("IP: $ip_address\nUser Agent: $user_agent", 'Información técnica');

// Enviar el formulario
header('Content-Type: application/json');
try {
    $result = $contact->send();
    if ($result) {
        echo 'OK'; // Respuesta esperada por validate.js
    } else {
        echo json_encode(['error' => 'Error al enviar el mensaje']);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>