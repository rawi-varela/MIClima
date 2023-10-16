
<h1>Administrar Privilegios</h1>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/th">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>


<div class="dashboard__contenedor-grid">
    <div class="dashboard__contenedor-privilegios">
        <!-- <p class="alinear-centro">Propiedades con Privilegio</p> -->
        <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">ID Propiedad</th>
                <th scope="col" class="table__th">Propiedad</th>
                <th scope="col" class="table__th"></th>
            </tr>
        </thead>

        <tbody class="table__tbody"> <!-- Mostrar los resultados-->
            <?php foreach($privilegios as $privilegio):  ?>
                <tr class="table__tr">
                    <td class="table__td"><?php echo $privilegio->propiedad_id; ?></td>
                    <td class="table__td"><?php echo $privilegio->propiedad->nombrePropiedad; ?></td>
                    <td class="table__td">
                        <form action="/admin/th-privilegios-eliminar" method="POST" class="table__formulario">
                            <input type="hidden" name="id" value="<?php echo $privilegio->id; ?>">
                            <button class="table__accion table__accion--eliminar" type="submit">
                                <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>


    <div class="dashboard__contenedor-privilegios">
        <!-- <p class="alinear-centro">Propiedades sin Privilegio</p> -->
        <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">ID Propiedad</th>
                <th scope="col" class="table__th">Propiedad</th>
                <th scope="col" class="table__th"></th>
            </tr>
        </thead>

        <tbody class="table__tbody"> <!-- Mostrar los resultados-->
            <?php foreach($propiedades as $propiedad):  ?>
                <?php if(!in_array($propiedad->id, array_column($privilegios,'propiedad_id'))) { ?>
                    <tr class="table__tr">
                        <td class="table__td"><?php echo $propiedad->id; ?></td>
                        <td class="table__td"><?php echo $propiedad->nombrePropiedad; ?></td>
                        <td class="table__td">
                            <form action="/admin/th-privilegios?id=<?php echo $anfitrion->id; ?>" method="POST" class="table__formulario">
                                <input type="hidden" name="propiedad_id" value="<?php echo $propiedad->id; ?>">
                                <input type="hidden" name="anfitriones_id" value="<?php echo $anfitrion->id; ?>">
                                <button class="table__accion table__accion--editar" type="submit">
                                    <i class="fa-solid fa-circle-plus"></i>
                                        Agregar
                                </button>
                        </form>
                        </td>
                    </tr>
                <?php } ?>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</div>