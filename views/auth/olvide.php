<section class="contenedor seccion contenido-centrado recuperar">
    <h1>Recuperar mi password</h1>

    <?php
      include_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form method="POST" class="formulario" action="/olvide">
      <fieldset>
          <legend>Diganos su email</legend>
  
          <div>
            <input type="email" name="email" id="email" required>
            <label for="email"><span>E-mail</span></label>
          </div>
  
        </fieldset>

        <input type="submit" value="Recuperar" class="boton boton-verde">
    </input>
  </div>

  </form>

  <div class="align-center log">
    <a href="/login">¿Ya tenes una cuenta? Inicia sesion</a>
    <a href="/registrar">¿Todavia no tenes una cuenta? Creemos una</a>
  </div>
</section>