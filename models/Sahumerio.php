<?php

namespace Model;

class Sahumerio extends ActiveRecord {
  protected static $tabla = 'sahumerios';
  protected static $columnasDB = ['id', 'nombre', 'marca', 'precio', 'imagen', 'descripcion', 'stock', 'cantidad'];

  public $id;
  public $nombre;
  public $marca;
  public $precio;
  public $imagen;
  public $descripcion;
  public $stock;
  public $cantidad;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->marca = $args['marca'] ?? '';
    $this->precio = $args['precio'] ?? '';
    $this->imagen = $args['imagen'] ?? '';
    $this->descripcion = $args['descripcion'] ?? '';
    $this->stock = $args['stock'] ?? '';
    $this->cantidad = $args['cantidad'] ?? '1';
  }

  public function validar() {
  
  if(!$this->nombre) {
    self::$errores[] = "Debes añadir un nombre";
  }
  if(!$this->marca) {
    self::$errores[] = "Debes añadir la marca";
  }
  if(!$this->precio) {
    self::$errores[] = "El precio es obligatorio";
  }
  if(strlen($this->descripcion) < 50) {
    self::$errores[] = "Debes añadir una descripcion con minimo 50 caracteres";
  }
  if(!$this->stock) {
    self::$errores[] = "Debes añadir el stock disponible";
  }
  if(!$this->imagen) {
    self::$errores[] = "La imagen es obligatoria";
  }

  return self::$errores;
  }
}

?>