<main class="contenedor">
    <h1>Crear Usuario TH</h1>

    <a href="/admin" class="boton-inline-block">Volver</a>

    <?php
        include_once __DIR__ . "/../../templates/alertas.php";
    ?>

    <form class="formulario" method="POST" action="/admin/th-crear"">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Registrar Puesto" class="boton-inline-block">
    </form>
</main>