<section class="seccion contenedor restablecido">
  <h1>Reestablecer password</h1>

  <?php
  include_once __DIR__ . '/../templates/alertas.php';
  ?>

  <?php if($error) return; ?>

  <form class="formulario" method="POST">
    <fieldset>
          <legend>Ingrese su nuevo password</legend>
  
          <div>
            <input type="password" name="password" id="password" required>
            <label for="password"><span>Tu nuevo password</span></label>
          </div>
  
          <input type="submit" class="boton align-center" value="Guardar">

    </fieldset>

        <div class="align-center log">
          <a href="/login">¿Ya tenes una cuenta? Inicia sesion</a>
          <a href="/registrar">¿Todavia no tenes una cuenta? Creemos una</a>
        </div>
  </form>
</section>