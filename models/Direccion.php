<?php

namespace Model;

class Direccion extends ActiveRecord {

  //? Base de datos
  protected static $tabla = 'direcciones';
  protected static $columnasDB = ['id', 'nombre', 'celular', 'direccion', 'entre', 'codigo', 'usuarios_id'];

  public $id;
  public $nombre;
  public $celular;
  public $direccion;
  public $entre;
  public $codigo;
  public $usuarios_id;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->celular = $args['celular'] ?? '';
    $this->direccion = $args['direccion'] ?? '';
    $this->entre = $args['entre'] ?? '';
    $this->codigo = $args['codigo'] ?? '';
    $this->usuarios_id = $args['usuarios_id'] ?? '';
  }
}

?>