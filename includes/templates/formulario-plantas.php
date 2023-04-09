<fieldset>
        <legend>Informacion General</legend>

        <div>
          <input type="text" name="planta[planta]" id="planta" value="<?php echo s($planta->planta); ?>" required>
          <label for="planta"><span>Nombre de la Planta</span></label>
        </div>

        <div>
          <input type="number" name="planta[precio]" id="precio" value="<?php echo s($planta->precio); ?>" required>
          <label for="precio"><span>Precio</span></label>
        </div>

        <div>
          <input type="file" name="planta[imagen]" id="imagen" accept="image/jpeg, image/png">
          <label for="imagen"><span>Imagen</span></label>
        </div>

        <?php if($planta->imagen): ?>
          <img src="/img/<?php echo $planta->imagen ?>" class="imagen-small">
        <?php endif; ?> 

        <div>
          <textarea name="planta[descripcion]" id="descripcion" required><?php echo s($planta->descripcion); ?></textarea>
          <label for="descripcion"><span>Descripcion</span></label>
        </div>
      </fieldset>

      <fieldset>
        <legend>Stock Disponible</legend>

        <div>
          <input type="number" name="planta[stock]" id="stock" value="<?php echo s($planta->stock); ?>" min="1" max="20" required>
          <label for="stock"><span>Stock</span></label>
        </div>

      </fieldset>
