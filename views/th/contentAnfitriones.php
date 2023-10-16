<main class="contenedor">
        <div class="alinear-centro">
            <h3>Bienvenido Usuario: <?php echo $_SESSION['nombre']; ?> </h3>
            <p>Anfitriones</p>       
            <a class="agregarAnfitrion" href="/th-agregar-anfitriones">Agregar Anfitrión</a>
        </div>
        <?php
            include_once __DIR__ . "/../templates/select.php";
        ?>
        <?php
        include_once __DIR__ . "/../templates/tablaAnfitriones.php";
        ?>
</main>
