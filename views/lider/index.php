
<main class="contenedor">
    <!-- <a class="alinear-derecha" href="/logout">Cerrar Sesión</a> -->
    <h3>Bienvenido Usuario: <?php echo $_SESSION['nombre']; ?> </h3>
    <p class="alinear-centro">Anfitriones</p>

    <?php 
    include_once __DIR__ . "/../templates/tablaAnfitriones.php";
    ?>
</main>