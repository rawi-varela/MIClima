<main class="contenedor seccion">
    <h1>Puestos</h1>

    <div class="dashboard__contenedor-boton">
        <a class="dashboard__boton" href="/admin/puestos-crear">
            <i class="fa-solid fa-circle-plus"></i>
            Agregar Puesto
        </a>
    </div>

    <div class="dashboard__contenedor">
    <?php if(!empty($puestos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">ID</th>
                    <th scope="col" class="table__th">Puesto</th>
                    <th scope="col" class="table__th">Nivel</th>
                    <th scope="col" class="table__th">Área</th>
                    <th scope="col" class="table__th">Propiedad</th>
                    <th scope="col" class="table__th">ID Líder</th>
                    <th scope="col" class="table__th">Puesto Líder</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($puestos as $puesto) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $puesto->id; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $puesto->nombrePosicion; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $puesto->nivel->tipo; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $puesto->area->nombreArea; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $puesto->propiedad->nombrePropiedad; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $puesto->idLider; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $puesto->posicionLider; ?>
                        </td>
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/puestos-actualizar?id=<?php echo $puesto->id; ?>">
                                <!-- <i class="fa-solid fa-user-pen"></i> -->
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/puestos-eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $puesto->id; ?>">
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
        <p class="text-center">Aún No Hay Puestos</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>


</main>

