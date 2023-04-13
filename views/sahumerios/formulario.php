<fieldset>
        <legend>Informacion General</legend>

        <div>
          <input type="text" name="sahumerio[nombre]" id="nombre" value="<?php echo s($sahumerio->nombre); ?>" required>
          <label for="nombre"><span>Nombre</span></label>
        </div>

        <div>
          <input type="text" name="sahumerio[marca]" id="marca" value="<?php echo s($sahumerio->marca); ?>" required>
          <label for="marca"><span>Marca</span></label>
        </div>

        <div>
          <input type="number" name="sahumerio[precio]" id="precio" value="<?php echo s($sahumerio->precio); ?>" required>
          <label for="precio"><span>Precio</span></label>
        </div>

        <div>
          <input type="file" name="sahumerio[imagen]" id="imagen" accept="image/jpeg, image/png">
          <label for="imagen"><span>Imagen</span></label>
        </div>

        <?php if($sahumerio->imagen): ?>
          <img src="/img/<?php echo $sahumerio->imagen ?>" class="imagen-small">
        <?php endif; ?> 

        <div>
          <textarea name="sahumerio[descripcion]" id="descripcion" required><?php echo s($sahumerio->descripcion); ?></textarea>
          <label for="descripcion"><span>Descripcion</span></label>
        </div>
      </fieldset>

      <fieldset>
        <legend>Stock Disponible</legend>

        <div>
          <input type="number" name="sahumerio[stock]" id="stock" value="<?php echo s($sahumerio->stock); ?>" min="1" max="20" required>
          <label for="stock"><span>Stock</span></label>
        </div>

      </fieldset>
