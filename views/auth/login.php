<main class="contenedor contenido-centrado">
  <h1>Iniciar Sesión</h1>

  <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

  <form method="POST" class="formulario" action="/login">
    <fieldset>
      <legend>Email y Password</legend>

        <label for="id">Nombre Usuario</label>
        <input type="text" name="id" placeholder="Tu Nombre de Usuario" id="id" >

        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña" placeholder="Tu contraseña" id="contraseña" >
      </fieldset>

    <input type="submit" value="Iniciar Sesión" class="boton boton-sesion">
  </form>

  <?php
      $script = "
      <script src='build/js/app.js'></script>
      "; 
  ?>
</main>