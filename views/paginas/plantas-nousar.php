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

  <main class="seccion contenedor">
  <h2>Nuestros Sahumerios</h2>
  
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
                <input type="hidden" name="id" id="id" value="<?php echo $sahumerio->id; ?>">
                <input type="hidden" name="nombre" id="nombre" value="<?php echo $sahumerio->nombre; ?>">
                <input type="hidden" name="precio" id="precio" value="<?php echo $sahumerio->precio; ?>">
                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo s(1); ?>">
                <input type="hidden" name="tipo" id="tipo" value="sahumerio">
                <input type="submit" name="btn-carrito"  value="Agregar al Carrito">
              </form>
            </div>
        </div>
        <!-- Anuncio -->
        <?php endforeach; ?>
  </div>
</main>
