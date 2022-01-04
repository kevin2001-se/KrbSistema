<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    return die();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


$nombre =  trim($_POST["nombre"]);
$celular =  trim($_POST["celular"]);
$correo =  trim($_POST["correo"]);
$mensaje =  trim($_POST["mensaje"]);

$mail = new PHPMailer(true);

try {
    
    $mail->SMTPDebug = 0;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com; smtp.live.com; smtp.office365.com; smtp.mail.yahoo.com;';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'zardero15@gmail.com';
    $mail->Password   = '981716799kbh';                             
    $mail->SMTPSecure = 'tls';            
    $mail->Port       = 587;                                    

    $mail->setFrom('zardero15@gmail.com', 'KRBSistemas');
    $mail->addAddress("cblash14@gmail.com");


    $mail->isHTML(true);                                  
    $mail->Subject = 'Contacto de '.$nombre;
    $mail->Body    = '
        celular : '.$celular.'<br>
        mensaje : '.$mensaje.'
    ';

    $mail->send();
    echo 'enviado';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}