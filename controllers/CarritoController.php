<?php

namespace Controllers;

use Model\Sahumerio;
use Model\Direccion;
use Model\DireccionProductos;
use MVC\Router;

class CarritoController {

  public static function carrito() {

    $sahumerios = Sahumerio::all();
    echo json_encode($sahumerios);

  }

  public static function direccion() {
    
    //? Almacena direccion y devuelve el id
    $direccion = new Direccion($_POST);
    $resultado = $direccion->guardarUsuario();

    $id = $resultado['id'];

    //? Almacena el id de la direccion y los productos
    
    //? Almacena los productos con el id de la direccion
    $idProductos = explode(",", $_POST['carrito']);
    $cantidades = explode(",", $_POST['cantidad']);

    foreach($idProductos as $cantidad => $idProducto) {
      $args = [
          'direccion_id' => $id,
          'sahumerios_id' => $idProducto,
          'cantidad' => $cantidades[$cantidad]
        ];
      $direccionProductos = new DireccionProductos($args);
      $direccionProductos->guardarUsuario();
    }

    echo json_encode(['resultado' => $resultado]);
  }

  public static function eliminar() {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id = $_POST['id'];
      $direccion = Direccion::find($id);
      $direccion->eliminar2();
      header('Location:' . $_SERVER['HTTP_REFERER']);
    }
  }

}

?>