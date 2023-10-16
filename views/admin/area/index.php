<main class="contenedor seccion">
    <h1>Departamentos</h1>

    <div class="dashboard__contenedor-boton">
        <a class="dashboard__boton" href="/admin/areas-crear">
            <i class="fa-solid fa-circle-plus"></i>
            Agregar Departamento
        </a>
    </div>

    <div class="dashboard__contenedor">
    <?php if(!empty($areas)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">ID</th>
                    <th scope="col" class="table__th">Área</th>
                    <th scope="col" class="table__th">Propiedad</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($areas as $area) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $area->id; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $area->nombreArea; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $area->propiedad->nombrePropiedad; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/areas-actualizar?id=<?php echo $area->id; ?>">
                                <!-- <i class="fa-solid fa-user-pen"></i> -->
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/areas-eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $area->id; ?>">
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
        <p class="text-center">Aún No Hay Departamentos</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>


</main>

