<?php

  use Model\Sahumerio;

  if($_SERVER['SCRIPT_NAME'] === '/anuncios.php') {
    $sahumerios = Sahumerio::all();
  } else {
    $sahumerios = Sahumerio::get(3);
  }

?>

<div class="caja-productos">
  <?php foreach($sahumerios as $sahumerio): ?>
      <div class="producto">
        <div class="caja-imagen">
          <img class="img-anuncio" src="/img/<?php echo $sahumerio->imagen; ?>" alt="anuncio" loading="lazy">
        </div>

          <h3><?php echo $sahumerio->nombre; ?></h3>
          <p><?php echo $sahumerio->marca; ?></p>

          <div class="precio-agregar">
            <p class="precio"><span>$</span><?php echo $sahumerio->precio; ?></p>
  
            <form method="POST" class="agregar">
              <input type="hidden" name="id" value="<?php echo $sahumerio->id; ?>">
              <input type="hidden" name="tipo" value="sahumerio">
              <input type="submit"  value="Agregar al Carrito">
            </form>
          </div>
      </div>
      <!-- Anuncio -->
      <?php endforeach; ?>
    </div>
    <!-- Contenedor de anuncios -->