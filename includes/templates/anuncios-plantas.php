<?php

  use Model\Planta;

  if($_SERVER['SCRIPT_NAME'] === '/anuncios.php') {
    $plantas = Planta::all();
  } else {
    $plantas = Planta::get(3);
  }

?>

<div class="caja-productos">
  <?php foreach($plantas as $planta): ?>
      <div class="producto">
        <div class="caja-imagen">
          <img class="img-anuncio" src="/img/<?php echo $planta->imagen; ?>" alt="anuncio" loading="lazy">
        </div>

          <h3><?php echo $planta->planta; ?></h3>

          <div class="precio-agregar">
            <p class="precio"><span>$</span><?php echo $planta->precio; ?></p>
  
            <form method="POST" class="agregar">
              <input type="hidden" name="id" value="<?php echo $planta->id; ?>">
              <input type="hidden" name="tipo" value="planta">
              <input type="submit"  value="Agregar al Carrito">
            </form>
          </div>
      </div>
      <!-- Anuncio -->
      <?php endforeach; ?>
    </div>
    <!-- Contenedor de anuncios -->