<?php

namespace Model;

class Usuario extends ActiveRecord {
  // Base de datos
  protected static $tabla = 'usuarios';
  protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'celular', 'admin', 'confirmado', 'token'];

  public $id;
  public $nombre;
  public $apellido;
  public $email;
  public $password;
  public $celular;
  public $admin;
  public $confirmado;
  public $token;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->celular = $args['celular'] ?? '';
    $this->admin = $args['admin'] ?? '0';
    $this->confirmado = $args['confirmado'] ?? '0';
    $this->token = $args['token'] ?? '';
  }

  // Mensaje de validacion para la creacion de la cuenta
  public function validarNuevaCuenta() {

    if(!$this->nombre) {
      self::$errores['error'][] = 'El nombre es obligatorio';
    }
    if(!$this->apellido) {
      self::$errores['error'][] = 'El apellido es obligatorio';
    }
    if(!$this->email) {
      self::$errores['error'][] = 'El email es obligatorio';
    }
    if(!$this->password) {
      self::$errores['error'][] = 'El password es obligatorio';
    }
    if(!$this->celular) {
      self::$errores['error'][] = 'Su celular es obligatorio';
    }
    if(strlen($this->password) < 6) {
      self::$errores['error'][] = 'El password debe contener al menos 6 caracteres';
    }

    return self::$errores;

  }

  public function validarLogin() {
    if(!$this->email) {
      self::$errores['error'][] = 'El email es obligatorio';
    }
    if(!$this->password) {
      self::$errores['error'][] = 'El password es obligatorio';
    }

    return self::$errores;
  }

  public function validarEmail() {
    if(!$this->email) {
      self::$errores['error'][] = 'El email es obligatorio';
    }

    return self::$errores;
  }

  public function validarPassword() {
    if(!$this->password) {
      self::$errores['error'][] = 'El password es obligatorio';
    }
    if(strlen($this->password < 6)) {
      self::$errores['error'][] = 'El password debe tener al menos 6 caracteres';
    }

    return self::$errores;
  }

  public function existeUsuario() {
    // Revisar si el usuario existe o no
    $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

    $resultado = self::$db->query($query);

    if($resultado->num_rows) {
      self::$errores['error'][] = 'El usuario ya existe';
      return;
    }

    return $resultado;
  }

  public function hashPassword() {
    $this->password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  public function crearToken() {
    $this->token = uniqid();
  }


  public function comprobarPassword($password) {
    $resultado = password_verify($password, $this->password);

    if(!$this->confirmado) {
      self::$errores['error'][] = " Tu cuenta no fue confirmada";
    } else if(!$resultado) {
      self::$errores['error'][] = " El password es incorrecto";
    } 
    else {
      return true;
    }
  }

  public function autenticar() {
    session_start();

    // LLenar el arreglo dde sesion
    $_SESSION['usuario' || 'admin'] = $this->email;
    $_SESSION['login'] = true;

    header('Location: /admin');

  }

}

?>