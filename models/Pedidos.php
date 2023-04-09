<?php

namespace Model;

class Pedidos extends ActiveRecord {
  protected static $tabla = 'direccionproductos';
  protected static $columnasDB = ['id', 'direccion', 'cliente', 'email', 'celular', 'producto', 'marca', 'precio', 'cantidad'];

  public $id;
  public $direccion;
  public $cliente;
  public $email;
  public $celular;
  public $producto;
  public $marca;
  public $precio;
  public $cantidad;

  public function __construct() {
    $this->id = $args['id'] ?? null;
    $this->direccion = $args['direccion'] ?? '';
    $this->cliente = $args['cliente'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->celular = $args['celular'] ?? '';
    $this->producto = $args['producto'] ?? '';
    $this->marca = $args['marca'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->cantidad = $args['cantidad'] ?? '';
  }
}

?>