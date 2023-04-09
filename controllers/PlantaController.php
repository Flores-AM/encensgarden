<?php

  namespace Controllers;
  use MVC\Router;
  use Model\Planta;
  use Intervention\Image\ImageManagerStatic as Image;

  class PlantaController {

    public static function crear(Router $router) {

      isAdmin();

      $planta = new Planta;

      // Arreglo con mensajes de errores
      $errores = Planta::getErrores();
      
      if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Crea una nueva instancia
        $planta = new Planta($_POST['planta']);

        // Generar nombre unico
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg" ;

        // Setear la imagen
        // Realiza un resize a la imagen con intervention image
        if($_FILES['planta']['tmp_name']['imagen']) {
          $image = Image::make($_FILES['planta']['tmp_name']['imagen']);
          // fit->(800,600);
          $planta->setImagen($nombreImagen);
        }

        // Validar
        $errores = $planta->validar();

        if(empty($errores)) {

          // Crear carpeta para subir las imagenes
          if(!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
          }

          // Guarda la imagen en el servidor
          $image->save(CARPETA_IMAGENES . $nombreImagen);
          
          // Guardar en la BD
          $planta->guardar();
        }
      }

    $router->render('plantas/crear', [
      'planta' => $planta,
      'errores' => $errores
    ]);
  }

    public static function actualizar(Router $router) {

      isAdmin();
      
      $id = validarORedireccionar('/admin');

      $planta = Planta::find($id);

      // Arreglo con mensajes de errores
      $errores = Planta::getErrores();

      if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos
        $args = $_POST['planta'];

        $planta->sincronizar($args);

        // Validacion
        $errores = $planta->validar();
        
        // Subida de archivos
        // Generar nombre unico
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg" ;

        if($_FILES['planta']['tmp_name']['imagen']) {
          $image = Image::make($_FILES['planta']['tmp_name']['imagen']);
          // fit->(800,600);
          $planta->setImagen($nombreImagen);
        }

        // Revisar que el arreglo de errores este vacio
        if(empty($errores)) {
          if($_FILES['planta']['tmp_name']['imagen']) {
            // Almacenar la imagen
            $image->save(CARPETA_IMAGENES . $nombreImagen);
          }

          $planta->guardar();
        }
      }

    $router->render('/plantas/actualizar', [
      'planta' => $planta,
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
          if($tipo === 'planta') {
            $planta = Planta::find($id);
            $planta->eliminar();
          }
        }

      }
    }
  }

}

?>