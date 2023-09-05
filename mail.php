<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

$mail = new PHPMailer();
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'nodej4582@gmail.com';                    
    $mail->Password   = 'jsnode##45678';                                  
    $mail->SMTPSecure = 'tls';     
    $mail->Port       = 587;    
    $mail->isHTML(true);
    $mail->CharSet = "UTF-8";



?>       