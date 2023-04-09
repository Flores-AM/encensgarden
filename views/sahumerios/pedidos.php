<h1 id="t-pedido">Pedidos</h1>


<div id="pedidos-admin" class="seccion contenedor">
    <a href="/admin" class="boton crear-s"><span>Volver</span></a>
  <ul class="pedidos">
    <?php
      $idPedido = 0;
      foreach($pedidos as $key => $pedido):
      if($idPedido !== $pedido->id): $total = 0;
    ?>
      <li>
        <p id="n-pedido">N° de Pedido: <span><?php echo $pedido->id; ?></span></p>
        <p>Cliente: <span><?php echo $pedido->cliente; ?></span></p>
        <p>Direccion: <span><?php echo $pedido->direccion; ?></span></p>
        <p>Celular: <span><?php echo $pedido->celular; ?></span></p>
        <p>Email: <span><?php echo $pedido->email; ?></span></p>
        <p id="titulo-prod">Productos:</p>
        <?php
          $idPedido = $pedido->id;
        endif;
        $total += $pedido->precio * $pedido->cantidad;
        ?>
        <p class="productos"><span><?php echo $pedido->producto . "-" . $pedido->marca . " " . "$" . $pedido->precio; ?></span>s<span id="n-cantidad"><?php echo $pedido->cantidad; ?></span></p>

        <?php $actual = $pedido->id;
            $proximo = $pedidos[$key + 1]->id ?? 0;

            if(esUltimo($actual, $proximo)) { ?>
              
              <P class="total">Total:<span> $<?php echo $total; ?> </span></p>

              <form action="/api/eliminar" method="POST">
                <input type="hidden" name="id" value="<?php echo $pedido->id; ?>">
                <button type="submit" class="eliminar" value="eliminar"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="25" height="25" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="4" y1="7" x2="20" y2="7" />
                <line x1="10" y1="11" x2="10" y2="17" />
                <line x1="14" y1="11" x2="14" y2="17" />
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                </button>
              </form>

              <?php
            }
      ?>

        <?php endforeach;?>
      </li>
  </ul>
</div>