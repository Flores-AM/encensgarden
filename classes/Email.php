<?php

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email {

  public $nombre;
  public $email;
  public $token;

  public function __construct($nombre, $email, $token){

    $this->nombre = $nombre;
    $this->email = $email;
    $this->token = $token;

  }

  public function enviarConfirmacion() {

    // Crear el objeto de email
    $email = new PHPMailer();
    $email->isSMTP();
    // $email->Host = 'sandbox.smtp.mailtrap.io';
    $email->Host = 'smtp.gmail.com';
    $email->SMTPDebug= 2;
    $email->Mailer= "smtp";
    $email->SMTPAuth = true;
    // $email->Port = 2525;
    // $email->Username = '7f7a6941c9f2a9';
    // $email->Password = 'eb7fa85b8daf52';
    $email->Port = 587;
    $email->Username = 'agustinmatias62@gmail.com';
    $email->Password = 'ubjgawmchvfvdzui';
    $email->Priority = 1;
    $email->SMTPSecure = 'tls';

    $email->addAddress($this->email);
    $email->setFrom('monique@encens.com', 'encens&garden.com');
    $email->Subject = 'Confirma tu cuenta';

    // Set HTML
    $email->isHTML(true);
    $email->CharSet = 'utf-8';

    $contenido = "<html>";
    $contenido .= "<p><strong>¡Hola " . $this->nombre . "!</strong> creaste tu cuenta en Encens & Garden, por favor visita el enlace que te enviamos para confirmar tu identidad.</p>";
    $contenido .= "<p>Presiona acá: <a href='https://encens.herokuapp.com/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
    $contenido .= "<p>Si no solicitaste esta cuenta, podes ignorar este mensaje</p>";
    $contenido .= "</html>";
    $email->Body = $contenido;

    // Enviar email
    // $email->send();
    if($email->send()){ 
            echo ' ';
        }else{
            echo ' ';
        }

  }

  public function enviarInstrucciones() {
    // Crear el objeto de email
    $email = new PHPMailer();
    $email->isSMTP();
    $email->Host = 'sandbox.smtp.mailtrap.io';
    $email->SMTPAuth = true;
    $email->Port = 2525;
    $email->Username = '7f7a6941c9f2a9';
    $email->Password = 'eb7fa85b8daf52';
    $email->SMTPSecure = 'tls';

    $email->setFrom($this->email);
    $email->addAddress('monique@encens.com', 'encens&garden.com');
    $email->Subject = 'Reestablece tu password';

    // Set HTML
    $email->isHTML(true);
    $email->CharSet = 'utf-8';

    $contenido = "<html>";
    $contenido .= "<p><strong>¡Hola " . $this->nombre . "!</strong> Nos solicitaste reestablecer tu password, ingresa al siguiente enlace para que podamos continuar</p>";
    $contenido .= "<p>Presiona acá: <a href='https://encens.herokuapp.com/recuperar?token=" . $this->token . "'>Reestablecer password</a></p>";
    $contenido .= "<p>Si no solicitaste esta cuenta, podes ignorar este mensaje</p>";
    $contenido .= "</html>";
    $email->Body = $contenido;

    // Enviar email
    $email->send();
  }
}

?>