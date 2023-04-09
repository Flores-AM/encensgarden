<main class="contenedor seccion crear">
    <h1>Crear Nuevo Producto</h1>

    <?php foreach($errores as $error): ?>
      <div class="alerta error">
        <?php echo $error; ?>
      </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton"><span>Volver</span></a>

    <form class="formulario" method="POST"  enctype="multipart/form-data">
      <?php include __DIR__ . '/formulario.php'; ?>

      <input type="submit" value="Crear Producto" class="boton crear-f">
    </form>
  </main>