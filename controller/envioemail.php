<?php

//$to = filter_input(INPUT_GET, 'email');
$to = Config::EMAIL_USER;
$subject = 'Contato - Loja DIMTech';
$message = filter_input(INPUT_GET, 'name');

$destinatario = filter_input(INPUT_GET, 'email');

$headers = "From: " . $destinatario;

//$headers = 'From: ' . 'email '. ' ' . "\r\n" .
//        'Reply-To: webmaster@example.com' . "\r\n" .
//        'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

?>

<script>alert('Email enviado com sucesso!!')</script>
<meta http-equiv="refresh" content="0; url=contato">


