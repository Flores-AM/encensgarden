<section class="contenedor seccion contenido-centrado login">
    <h1>Iniciar Sesion</h1>

    <?php
      include_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form method="POST" class="formulario" action="/login">
      <fieldset>
          <legend>Email y Password</legend>
  
          <div>
            <input type="email" name="email" id="email" required>
            <label for="email"><span>E-mail</span></label>
          </div>
  
          <div>
            <input type="password" name="password" id="password" required>
            <label for="password"><span>Password</span></label>
          </div>
  
        </fieldset>

        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </input>
  </div>

  </form>

  <div class="align-center log">
    <a href="/registrar">¿Todavia no tenes una cuenta? Creemos una</a>
    <a href="/olvide">¿Olvidaste tu password? Lo recuperamos</a>
  </div>
</section>