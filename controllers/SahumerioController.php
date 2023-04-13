<?php

  namespace Controllers;
  use MVC\Router;
  use Model\Sahumerio;
  use Model\Planta;
  use Intervention\Image\ImageManagerStatic as Image;
  use Model\Pedidos;


  class SahumerioController {
    public static function index(Router $router) {

      isAdmin();

      $sahumerios = Sahumerio::all();
      $plantas = Planta::all();

      // Mostrar mensaje condicional
      $resultado = $_GET['resultado'] ?? null;
      
      $router->render('sahumerios/admin', [
        'sahumerios' => $sahumerios,
        'resultado' => $resultado,
        'plantas' => $plantas
      ]);
    }

    public static function crear(Router $router) {

      isAdmin();

      $sahumerio = new Sahumerio;

      // Arreglo con mensajes de errores
      $errores = Sahumerio::getErrores();
      
      if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
      // Crea una nueva instancia
      $sahumerio = new Sahumerio($_POST['sahumerio']);

      // Generar nombre unico
      $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg" ;

      // Setear la imagen
      // Realiza un resize a la imagen con intervention image
      if($_FILES['tmp_name']['imagen']) {
        $image = Image::make($_FILES['tmp_name']['imagen']);
        // fit->(800,600);
        $sahumerio->setImagen($nombreImagen);
      }

      // Validar
      $errores = $sahumerio->validar();

      if(empty($errores)) {

        // Crear carpeta para subir las imagenes
        if(!is_dir(CARPETA_IMAGENES)) {
          mkdir(CARPETA_IMAGENES);
        }

        // Guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);
        
        // Guardar en la BD
        $sahumerio->guardarUsuario();
      }
    }

    $router->render('sahumerios/crear', [
      'sahumerio' => $sahumerio,
      'errores' => $errores
    ]);
  }

    public static function actualizar(Router $router) {

      isAdmin();
      
      $id = validarORedireccionar('/admin');

      $sahumerio = Sahumerio::find($id);

      // Arreglo con mensajes de errores
      $errores = Sahumerio::getErrores();

      if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos
        $args = $_POST['sahumerio'];

        $sahumerio->sincronizar($args);

        // Validacion
        $errores = $sahumerio->validar();
    
        // Subida de archivos
        // Generar nombre unico
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg" ;

        if($_FILES['sahumerio']['tmp_name']['imagen']) {
          $image = Image::make($_FILES['sahumerio']['tmp_name']['imagen']);
          // fit->(800,600);
          $sahumerio->setImagen($nombreImagen);
        }

        // Revisar que el arreglo de errores este vacio
        if(empty($errores)) {
          if($_FILES['sahumerio']['tmp_name']['imagen']) {
            // Almacenar la imagen
            $image->save(CARPETA_IMAGENES . $nombreImagen);
          }

          $sahumerio->guardar();
        }
  }

    $router->render('/sahumerios/actualizar', [
      'sahumerio' => $sahumerio,
      'errores' => $errores
    ]);
  }

  public static function eliminar() {
    isAdmin();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Validar id
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {

        $tipo = $_POST['tipo'];

        if(validarTipoContenido($tipo)) {
          
          // Compara lo que vamos a eliminar
          if($tipo === 'sahumerio') {
            $sahumerio = Sahumerio::find($id);
            $sahumerio->eliminar();
          }
        }

      }
    }
  }

  public static function pedidos(Router $router) {

    isAdmin();

    //? Consultar la base de datos
    $consulta = "SELECT direcciones.id, CONCAT(direcciones.direccion, ' ', direcciones.entre, ' ', direcciones.codigo) as direccion, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, direccionproductos.cantidad, ";
    $consulta .= " usuarios.email, usuarios.celular, sahumerios.nombre as producto, sahumerios.marca, sahumerios.precio  ";
    $consulta .= " FROM direcciones  ";
    $consulta .= " LEFT OUTER JOIN usuarios ";
    $consulta .= " ON direcciones.usuarios_id=usuarios.id  ";
    $consulta .= " LEFT OUTER JOIN direccionproductos ";
    $consulta .= " ON direccionproductos.direcciones_id=direcciones.id ";
    $consulta .= " LEFT OUTER JOIN sahumerios ";
    $consulta .= " ON sahumerios.id=direccionproductos.sahumerios_id";

    $pedidos = Pedidos::SQL($consulta);

    $router->render('sahumerios/pedidos', [
      'nombre' => $_SESSION['nombre'],
      'pedidos' => $pedidos
    ]);
  }

}

?>