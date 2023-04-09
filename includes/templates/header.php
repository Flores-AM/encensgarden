<?php

if(!isset($_SESSION)) {
  session_start();
}

$auth = $_SESSION['login'] ?? false;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
  <nav class="nav <?php echo $inicio ? 'inicio' : ''; ?>">
    <div id="marker"></div>
    <a href="../../index.php">Inicio</a>
    <a href="../../anuncios.php">Productos</a>
    <a href="#">Blog</a>
    <a href="../../contacto.php">Contacto</a>
    <?php if($auth): ?>
      <a href="cerrar-sesion.php" class="cerrar-sesion">Cerrar Sesion</a>
    <?php endif; ?>
  </nav>
