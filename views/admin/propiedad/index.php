<main class="contenedor seccion">
    <h1>Propiedades</h1>

    <div class="dashboard__contenedor-boton">
        <a class="dashboard__boton" href="/admin/propiedades-crear">
            <i class="fa-solid fa-circle-plus"></i>
            Agregar Propiedad
        </a>
    </div>

    <div class="dashboard__contenedor">
    <?php if(!empty($propiedades)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">ID</th>
                    <th scope="col" class="table__th">Propiedad</th>
                    <th scope="col" class="table__th">Imagen</th>
                    <th scope="col" class="table__th">Tipo</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($propiedades as $propiedad) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $propiedad->id; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $propiedad->nombrePropiedad; ?>
                        </td>
                        <td class="table__td">
                            <div class="table__imagen">
                                <picture>
                                    <source srcset="<?php echo $_ENV['HOST'] . '/imagenes/propiedades/' . $propiedad->imagen; ?>.webp" type="image/webp">
                                    <source srcset="<?php echo $_ENV['HOST'] . '/imagenes/propiedades/' . $propiedad->imagen; ?>.png" type="image/png">
                                    <img src="<?php echo $_ENV['HOST'] . '/imagenes/propiedades/' . $propiedad->imagen; ?>.png" alt="Imagen Propiedad">
                                </picture>
                            </div>
                        </td>
                        <td class="table__td">
                            <?php echo $propiedad->tipoP->tipo; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/propiedades-actualizar?id=<?php echo $propiedad->id; ?>">
                                <!-- <i class="fa-solid fa-user-pen"></i> -->
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/propiedades-eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center">Aún No Hay Propiedades</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>


</main>

