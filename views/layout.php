<?php

// if(!isset($_SESSION)) {
//   session_start();
// }

$admin = $_SESSION['admin'] ?? false;
$auth = $_SESSION['login'] ?? false;

$nombre = $_SESSION['nombre'] ?? false;
$idUser = $_SESSION['id'] ?? false;

if(!isset($inicio)) {
  $inicio = false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encens & Garden</title>
  <link rel="stylesheet" href="../build/css/app.css">
</head>
<body class="body">
  <nav class="nav <?php echo $inicio ? 'inicio' : ''; ?>">
    <div id="marker"></div>
    <a href="/">Inicio</a>
    <a href="/productos">Productos</a>
    <a href="/blog">Blog</a>
    <a href="/contacto">Contacto</a>
    <?php if($admin): ?>
      <a href="/admin" class="iniciar">Admin</a>
    <?php endif; ?>
    <?php if($auth): ?>
      <a href="/logout" class="iniciar cerrar">Salir</a>
    <?php endif; ?>
    <?php if(!$auth): ?>
      <a href="/login" class="iniciar" >Ingresar</a>
      <a href="/registrar" class="iniciar">Registrarme</a>
    <?php endif; ?>
  </nav>

  <div class="carrito">
    <div class="cajita-img">
      <span id="contador">0</span>
      <img class="img-carrito" src="/build/img/carrito-de-compras.png" alt="">
    </div>
    <div class="lista-carrito">

      <div class="cerrar-carrito">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <line x1="18" y1="6" x2="6" y2="18" />
        <line x1="6" y1="6" x2="18" y2="18" />
        </svg>
      </div>

      <div class="tabs">
        <button type="button" ><img data-paso="1" class="actual img-btn" src="/build/img/echale-un-vistazo.png" alt=""></button>
        <button type="button" ><img data-paso="2" class="img-btn" src="/build/img/caja-del-paquete.png" alt=""></button>
        <button type="button" ><img data-paso="3" class="img-btn" src="/build/img/escritura.png" alt=""></button>
      </div>

      <div class="seccion rellenar contenido-lista-carrito" id="paso-1">
        <h3>Tus Productos</h3>
        <div class="lista-carro"></div>
        <p class="totales">TOTAL: $<span id="total"></span></p>
      </div>

      <div class="seccion rellenar" id="paso-2">
        <h3>Direccion de Entrega</h3>
        <form class="formulario">
          <fieldset>
            <div>
              <input type="text" id="nombre-venta" required>
              <label for="nombre"><span>Nombre Completo</span></label>
            </div>

            <div>
              <input type="tel" id="celular-venta"  required>
              <label for="celular"><span>Celular</span></label>
            </div>

            <div>
              <input type="text" id="direccion-venta"  required>
              <label for="direccion"><span>Direccion</span></label>
            </div>

            <div>
              <input type="text" id="entre-venta"  required>
              <label for="entre"><span>Entre Calles</span></label>
            </div>

            <div>
              <input type="tel" id="codigo-venta"  required>
              <label for="codigo"><span>Codigo Postal</span></label>
            </div>

            <input type="hidden" id="idUser" value="<?php echo $idUser; ?>">

          </fieldset>
        </form>
      </div>

      <div class="seccion rellenar" id="paso-3">
        <div class="contenido-resumen">
          <h3>Resumen</h3>
        </div>
        <?php if(!$auth): ?>
          <div class="caja-iniciar-resumen align-center">
            <p class="alerta">Debes Iniciar Sesión</p>
            <a href="/login" class="boton ini-resumen"><span>Iniciar Sesión</span></a>
          </div>
        <?php endif; ?>
      </div>

      <div class="paginacion">
        <button id="anterior" >&laquo; Anterior</button>

        <button id="siguiente" >Siguiente &raquo;</button>
      </div>

    </div>
  </div>

<?php echo $contenido; ?>

<section class="seccion contenedor">
   <div class="container-acordion">
  <h2>Preguntas Frecuentes</h2>
  <div class="accordion">
    <div class="accordion-item">
      <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">¿Hacen envios a mi domicilio?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Si, hacemos entregas a domicilio si recidis en la zona 'General Pacheco' o alrededores, si excedes el limite se puede coordinar un punto de encuentro para realizar la entrega. </p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Carrito de compras no me deja seleccionar la cantidad de productos que deseo...</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Claro, esto es debido a que el maximo stock actual del producto es esa misma cantidad, cuando haya un reingreso el stock se actualizara automaticamente</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">¿Tienen metodos de pago en linea?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Estamos trabajando en eso, proximamente lo estaremos incluyendo !</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">No encuentro el producto que deseo :(</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Si es un producto de nuestro catalogo no te preocupes, el reingreso no tarda! Si no es el caso, dejanos tu mensaje <a id="aca" href="/contacto">acá</a> con el producto que te gustaria que ingresaramos :)</p>
      </div>
    </div>
    <!-- <div class="accordion-item">
      <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">How do airplanes stay up?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
      </div>
    </div> -->
  </div>
</div>
</section>

<script src="../build/js/bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>