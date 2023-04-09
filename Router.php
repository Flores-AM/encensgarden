<?php

namespace MVC;

  class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn) {
      $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn) {
      $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {

      session_start();
      
      $admin = $_SESSION['admin'] ?? null;

      // Arreglo de rutas protegidas
      $rutas_protegidas = ['/admin', '/sahumerios/crear', '/sahumerios/actualizar', '/sahumerios/eliminar', '/plantas/crear', '/plantas/actualizar', '/plantas/eliminar'];

      $urlActual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
      $metodo = $_SERVER['REQUEST_METHOD'];

      if($metodo === 'GET') {
        $fn = $this->rutasGET[$urlActual] ?? null;
    } else {
      $fn = $this->rutasPOST[$urlActual] ?? null;
    }

    if(in_array($urlActual, $rutas_protegidas) && !$admin) {
      header('Location: /');
    }

    if($fn) {
      // La url existe y hay una funcion asociada
      call_user_func($fn, $this);
    } else {
      echo 'Pagina no encontrada';
    }

  }

  // Muestra una vista
  public function render($view, $datos = []) {

    foreach($datos as $key => $value) {
      $$key = $value;
    }

    ob_start();
    include __DIR__ . "/views/$view.php";

    // Limpia el contenido
    $contenido = ob_get_clean();

    include __DIR__ . "/views/layout.php";
  }

}

?>