<h1>Actualizar Unidad de Negocio</h1>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/propiedades">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>

<div class="dashboard__formulario">
    <?php
        include_once __DIR__ . "/../../templates/alertas.php";
    ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Actualizar Unidad de Negocio" class="formulario__submit formulario__submit--registrar">
    </form>
</div>