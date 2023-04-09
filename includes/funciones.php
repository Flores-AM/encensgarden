<?php


define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/img/');

function incluirTemplate( string $nombre, bool $inicio = false ) {
  include TEMPLATES_URL . "/$nombre.php";
}

// function estaAutenticado() : bool {
//   session_start();

//   if(!$_SESSION['login']) {
//     header('Location: /');
//   }

//   return false;
// }

function debuguear($variable) {
  echo "<pre>";
  var_dump($variable);
  echo "</pre>";
  exit;
}

// Escapa / sanitizar el HTML
function s($html) {
  $s = htmlspecialchars($html);
  return $s;
}

// validar tipo de contenido
function validarTipoContenido($tipo) {
  $tipos = ['planta', 'sahumerio'];

  return in_array($tipo, $tipos);
}

// Muestra los mensajes
function mostrarNotificacion($codigo) {
  $mensaje = '';

  switch($codigo) {
    case 1:
      $mensaje = 'Creado Correctamente';
      break;
    case 2:
      $mensaje = 'Actualizado Correctamente';
      break;
    case 3:
      $mensaje = 'Eliminado Correctamente';
      break;
    default:
      $mensaje = false;
      break;
  }

  return $mensaje;
}

function validarORedireccionar(string $url) {
  // Validar que sea un ID valido
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id) {
    header("Location: $url");
  }

  return $id;

}

// Revisar que este autenticado
function isAuth() : void {
  if(!isset($_SESSION['login'])) {
    header('Location: /login');
  }
}

function isAdmin() : void {
  if(!isset($_SESSION['admin'])) {
    header('Location: /');
  }
}

function esUltimo(string $actual, string $proximo) : bool {
    if($actual !== $proximo) {
        return true;
    }
    return false;
}

?>