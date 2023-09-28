<main class="contenedor">
    <h1>Crear Propiedad</h1>

    <a href="/admin" class="boton-inline-block">Volver</a>

    <?php
        include_once __DIR__ . "/../../templates/alertas.php";
    ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Registrar Propiedad" class="boton-inline-block">
    </form>
</main>