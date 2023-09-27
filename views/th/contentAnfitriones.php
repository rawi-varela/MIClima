<main class="contenedor">
        <a class="btnNavegacion alinear-izquierda" href="/th-perfil">Regresar</a>
        <div class="alinear-centro">
            <h3>Bienvenido Usario: <?php echo $_SESSION['nombre']; ?> </h3>
            <p>Anfitriones</p>       
            <a class="agregarAnfitrion" href="/agregar-anfitriones">Agregar Anfitrión</a>
        </div>
        <?php
            include_once __DIR__ . "/../templates/select.php";
        ?>
        <?php
        include_once __DIR__ . "/../templates/tablaAnfitriones.php";
        ?>
</main>