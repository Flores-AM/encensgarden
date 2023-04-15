<?php 

$mostrarPregs = true;

$auth = $_SESSION['login'] ?? false;

?>
<section class="seccion contenedor align-center contacto-form">

  <h1>Contactanos</h1>

  <?php if($mensaje): ?>
      <p class='alerta exito'><?php echo $mensaje; ?></p>
  <?php endif; ?>

  <form class="formulario" method="POST" action="/contacto">
    <fieldset>
      <legend>Completa con tus datos</legend>

      <div>
          <input type="text" id="nombre" name="contacto[nombre]"  required>
          <label for="nombre"><span>Nombre Completo</span></label>
      </div>

      <div>
          <input type="email" id="email" name="contacto[email]"  required>
          <label for="email"><span>Tu E-mail</span></label>
      </div>

      <div>
          <input type="number" id="celular" name="contacto[celular]"  required>
          <label for="celular"><span>Tu Celular</span></label>
      </div>

      <div>
          <textarea  id="mensaje" name="contacto[mensaje]" required></textarea>
          <label for="mensaje"><span>Mensaje</span></label>
      </div>
    </fieldset>

    <?php if($auth): ?>
      <div class="container-btn">
        <a class="button">
          <div class="button__line"></div>
          <div class="button__line"></div>
          <input type="submit" value="Enviar" class="button__text">
          <p class="button__text"></p>
          <div class="button__drow1 violeta"></div>
          <div class="button__drow2 violeta"></div>
        </a>
      </div>
    <?php endif; ?>
    <?php if(!$auth): ?>
      <p class="alerta">Debes iniciar sesion para contactarnos !</p>
    <?php endif; ?>
      
  </form>
</section>