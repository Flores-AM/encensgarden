<section class="contenedor seccion contenido-centrado registrar">
    <h1>Crear una cuenta</h1>

    <?php
      include_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form method="POST" class="formulario" action="/registrar">
      <fieldset>
          <legend>Complete el formulario</legend>
  
          <div>
            <input value="<?php echo s($usuario->nombre); ?>" type="text" name="nombre" id="nombre" required>
            <label for="nombre"><span>Nombre</span></label>
          </div>

          <div>
            <input value="<?php echo s($usuario->apellido); ?>" type="text" name="apellido" id="apellido" required>
            <label for="apellido"><span>Apellido</span></label>
          </div>

          <div>
            <input value="<?php echo s($usuario->celular); ?>" type="tel" name="celular" id="celular" required>
            <label for="celular"><span>Celular</span></label>
          </div>

          <div>
            <input value="<?php echo s($usuario->email); ?>" type="email" name="email" id="email" required>
            <label for="email"><span>E-mail</span></label>
          </div>
  
          <div>
            <input  type="password" name="password" id="password" required>
            <label for="password"><span>Password</span></label>
          </div>
  
        </fieldset>

        <input type="submit" value="Crear Cuenta" class="boton">
  </div>

  </form>

  <div class="align-center log">
    <a href="/login">¿Ya tenes una cuenta? Inicia sesion</a>
    <a href="/olvide">¿Olvidaste tu password? Lo recuperamos</a>
  </div>
</section>