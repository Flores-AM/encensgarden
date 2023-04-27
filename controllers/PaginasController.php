<?php

namespace Controllers;

use MVC\Router;
use Model\Sahumerio;
use Model\Planta;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
  public static function index(Router $router) {
    
    $sahumerios = Sahumerio::get(3);
    $plantas = Planta::get(3);
    $inicio = true;
    
    $router->render('paginas/index', [
      'sahumerios' => $sahumerios,
      'plantas' => $plantas,
      'inicio' => $inicio
    ]);
  }

  public static function productos(Router $router) {

    $sahumerios = Sahumerio::all();
    $plantas = Planta::all();

    $router->render('paginas/productos', [
      'sahumerios' => $sahumerios,
      'plantas' => $plantas
    ]);
  }

  public static function sahumerios(Router $router) {

    $sahumerios = Sahumerio::all();

    $router->render('paginas/sahumerios', [
      'sahumerios' => $sahumerios
    ]);
  }

  public static function plantas(Router $router) {

    $plantas = Planta::all();

    $router->render('paginas/plantas', [
      'plantas' => $plantas
    ]);
  }

  public static function blog(Router $router) {
    
    $router->render('paginas/blog', []);
  }

  public static function contacto(Router $router) {
    
    $mensaje = null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

      $respuestas = $_POST['contacto'];

      $mail = new PHPMailer();

      $email = 'agustinmatias62@gmail.com';
      $pass = 'iyhyfpdgfbqjnslx';

      // Configurar SMTP
      $mail->isSMTP();
      // $mail->Host = 'sandbox.smtp.mailtrap.io';
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPDebug= 0;
      $mail->Mailer= "smtp";
      $mail->SMTPAuth = true;
      // $mail->Username = '924d735cb4ac0f';
      // $mail->Password = '0beddf60de637d';
      $mail->Port = 587;
      $mail->Username = $email;
      $mail->Password = $pass;
      $mail->Priority = 1;
      $mail->SMTPSecure = 'tls';
      // $mail->Port = 2525;

      // Configurar el contenido del mail
      // $mail->setFrom('monique@encens.com');
      // $mail->addAddress('agustinflores_wd@icloud.com');
      $mail->addAddress('agustinmatias62@gmail.com', 'Encens & Garden');
      $mail->setFrom('Encens & Garden', 'Encens & Garden');
      $mail->Subject = 'Tienes un Nuevo Mensaje';

      // Habilitar HTML
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';

      // Definir el contenido
      $contenido = '<html>';
      $contenido .= '<p>Encens & Garden</p>';
      $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . ' </p>';
      $contenido .= '<p>email: ' . $respuestas['email'] . ' </p>';
      $contenido .= '<p>celular: ' . $respuestas['celular'] . ' </p>';
      $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . ' </p>';
      $contenido .= '</html>';

      $mail->Body = $contenido;
      $mail->AltBody = 'Esto es texto alternativo sin HTML';

      // Enviar el mail
      if($mail->send()) {
        $mensaje = 'mensaje enviado correctamente';
      } else {
        $mensaje = 'El mensaje no se pudo enviar';
      }
    }

    $router->render('paginas/contacto', [
      'mensaje' => $mensaje
    ]);
  }

  
}

?>