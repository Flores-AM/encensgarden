<?php

namespace Model;

class DireccionProductos extends ActiveRecord {

  //? Base de datos
  protected static $tabla = 'direccionProductos';
  protected static $columnasDB = ['id', 'direccion_id', 'sahumerios_id', 'cantidad'];

  public $id;
  public $direccion_id;
  public $sahumerios_id;
  public $cantidad;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->direccion_id = $args['direccion_id'] ?? '';
    $this->sahumerios_id = $args['sahumerios_id'] ?? '';
    $this->cantidad = $args['cantidad'] ?? '';
  }
}

?>