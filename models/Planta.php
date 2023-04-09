<?php

namespace Model;

class Planta extends ActiveRecord {
  protected static $tabla = 'plantas';
  protected static $columnasDB = ['id', 'planta', 'precio', 'imagen', 'descripcion', 'stock'];

  public $id;
  public $planta;
  public $precio;
  public $imagen;
  public $descripcion;
  public $stock;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->planta = $args['planta'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->stock = $args['stock'] ?? '';
  }

  public function validar() {
    
    if(!$this->planta) {
      self::$errores[] = "Debes añadir el nombre de la planta";
    }
    if(!$this->precio) {
      self::$errores[] = "Debes añadir el precio";
    }
    if(!$this->imagen) {
      self::$errores[] = "Debes añadir su imagen";
    }
    if(strlen($this->descripcion) > 50) {
    self::$errores[] = "Debes añadir una descripcion con minimo 50 caracteres";
    }
    if(!$this->stock) {
    self::$errores[] = "Debes añadir el stock disponible";
    }

    return self::$errores;
  }
}

?>