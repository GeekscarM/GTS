<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

$email_from = 'geekscar.tech.service@gmail.com';
$email_subject = "New Form Submission";
$email_body = "Usuario: $name.\n".
                "Correo: $visitor_email.\n".
                    "Mensaje: $message.\n";

$to = "geekscar.tech.service@gmail.com";

$headers = "De: $email_from \r\n";
$headers .= "Responder-a: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);

header("Location: index.html");