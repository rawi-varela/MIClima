<?php
//Para que no marque error cuando 
if(!isset($propiedades)) {
    $propiedades = [];
}
if(!isset($areas)) {
    $areas = [];
}
if(!isset($puestos)) {
    $puestos = [];
}
if(!isset($anfitriones)) {
    $anfitriones = [];
}
?>

<main class="contenedor seccion">
    <h1>Bienvenido Administrador</h1>

    <?php
        //Notificaciones al borrar y actualizar
    ?>
    <a href="/admin/propiedades-crear" class="boton-inline-block">Agregar Propiedad</a>
    <a href="/admin/areas-crear" class="boton-inline-block">Agregar Área</a>
    <a href="/admin/puestos-crear" class="boton-inline-block">Agregar Puesto</a>
    <a href="/admin/th-crear" class="boton-inline-block">Agregar TH</a>


    <h3>Propiedades</h3>
    <table class="admin">
        <thead>
            <tr>
                <th>ID</th>
                <th>Propiedad</th>
                <th>Imagen</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los resultados-->
            <?php foreach($propiedades as $propiedad):  ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->nombrePropiedad; ?></td>
                    <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad" class="imagen-tabla"> </td>
                    <td><?php echo $propiedad->tipoPropiedad_id; ?></td>
                    <td>
                        <form action="/admin/propiedades-eliminar" method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipoCampo" value="propiedad">
                            <input type="submit" class="boton-width" value="Eliminar">
                        </form>
                        <a href="/admin/propiedades-actualizar?id=<?php echo $propiedad->id; ?>" class="boton-width">Editar</a>
                    </td>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Áreas</h3>
    <table class="anfitriones">
        <thead>
            <tr>
                <th>ID</th>
                <th>Área</th>
                <th>Propiedad</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los resultados-->
            <?php foreach($areas as $area): ?>
                <tr>
                    <td><?php echo $area->id; ?></td>
                    <td><?php echo $area->nombreArea; ?></td>
                    <td><?php echo $area->propiedad_id; ?></td>
                    <td>
                        <form action="/admin/area-eliminar" method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $area->id; ?>">
                            <input type="hidden" name="tipoCampo" value="area">
                            <input type="submit" class="boton-width" value="Eliminar">
                        </form>
                        <a href="/admin/area-actualizar?id=<?php echo $area->id; ?>" class="boton-width">Editar</a>
                    </td>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Puestos</h3>
    <table class="anfitriones">
        <thead>
            <tr>
                <th>ID</th>
                <th>Puesto</th>
                <th>Tipo</th>
                <th>Área</th>
                <th>Propiedad</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los resultados-->
            <?php foreach($puestos as $puesto): ?>
                <tr>
                    <td><?php echo $puesto->id; ?></td>
                    <td><?php echo $puesto->nombrePosicion; ?></td>
                    <td><?php echo $puesto->tipo; ?></td>
                    <td><?php echo $puesto->area; ?></td>
                    <td><?php echo $puesto->propiedad; ?></td>
                    <td>
                        <form action="/admin/puesto-eliminar" method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $puesto->id; ?>">
                            <input type="hidden" name="tipoCampo" value="puesto">
                            <input type="submit" class="boton-width" value="Eliminar">
                        </form>
                        <a href="/admin/puesto-actualizar?id=<?php echo $puesto->id; ?>" class="boton-width">Editar</a>
                    </td>
                </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Talento Humano</h3>
    <?php
        include_once __DIR__ . "/../templates/tablaAnfitriones.php";
    ?>


</main>

<?php
      $script = "
      <script src='build/js/app.js'></script>
      "; 
  ?>