<main class="contenedor seccion admin">
    <h1>Administrador de Monique Encens</h1>

    <?php
    if($resultado) {
    $mensaje = mostrarNotificacion(intval($resultado));
    if($mensaje) { ?>
      <p class="alerta exito"><?php echo s($mensaje); ?></p>
  <?php }
}
?>

    <section class="caja-botones-admin">
      <div>
        <a href="sahumerios/crear" class="boton crear-s"><span>Nuevo Producto</span></a>
        <a href="plantas/crear" class="boton crear-p"><span>Nueva Planta</span></a>
      </div>
      <div class="alinear-end">
        <a href="sahumerios/pedidos" class="boton crear-s"><span>Pedidos</span></a>
      </div>
    </section>

    <h2>Sahumerios</h2>

    <table class="sahumerios">
      <thead>
        <tr>
          <th>ID</th>
          <th>Producto</th>
          <th>Imagen</th>
          <th>Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody> <!-- Mostrar los resultados -->
        <?php foreach($sahumerios as $sahumerio): ?>
        <tr>
          <td><?php echo $sahumerio->id; ?></td>
          <td><?php echo $sahumerio->nombre; ?></td>
          <td><img class="imagen-tabla" src="/img/<?php echo $sahumerio->imagen; ?>"></td>
          <td>$<?php echo $sahumerio->precio; ?></td>
          <td>
            <!-- eliminar el anuncio -->
            <form method="POST" class="w-100" action="sahumerios/eliminar">
              <input type="hidden" name="id" value="<?php echo $sahumerio->id; ?>">
              <input type="hidden" name="tipo" value="sahumerio">
              <button type="submit" class="eliminar" value="eliminar"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="4" y1="7" x2="20" y2="7" />
                <line x1="10" y1="11" x2="10" y2="17" />
                <line x1="14" y1="11" x2="14" y2="17" />
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                </button>
            </form>
            <a href="/sahumerios/actualizar?id=<?php echo $sahumerio->id; ?>" class="actualizar">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#333" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
              <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
              <line x1="16" y1="5" x2="19" y2="8" />
              </svg>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <h2>Plantas</h2>

    <table class="sahumerios">
      <thead>
        <tr>
          <th>ID</th>
          <th>Planta</th>
          <th>Imagen</th>
          <th>Precio</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody> <!-- Mostrar los resultados -->
        <?php foreach($plantas as $planta): ?>
        <tr>
          <td><?php echo $planta->id; ?></td>
          <td><?php echo $planta->planta; ?></td>
          <td><img class="imagen-tabla" src="/img/<?php echo $planta->imagen; ?>"></td>
          <td><?php echo $planta->precio; ?></td>
          <td>
            <!-- eliminar el anuncio -->
            <form method="POST" class="w-100" action="plantas/eliminar">
              <input type="hidden" name="id" value="<?php echo $planta->id; ?>">
              <input type="hidden" name="tipo" value="planta">
              <input type="submit" class="boton eliminar" value="Eliminar">
            </form>
            <a href="/plantas/actualizar?id=<?php echo $planta->id; ?>" class="boton actualizar">Actualizar</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</main>