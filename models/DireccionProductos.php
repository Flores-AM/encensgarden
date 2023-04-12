<?php

namespace Model;

class DireccionProductos extends ActiveRecord {

  //? Base de datos
  protected static $tabla = 'direccionProductos';
  protected static $columnasDB = ['id', 'direcciones_id', 'sahumerios_id', 'cantidad'];

  public $id;
  public $direcciones_id;
  public $sahumerios_id;
  public $cantidad;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->direcciones_id = $args['direcciones_id'] ?? '';
    $this->sahumerios_id = $args['sahumerios_id'] ?? '';
    $this->cantidad = $args['cantidad'] ?? '';
  }
}

?>