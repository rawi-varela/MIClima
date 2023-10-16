
<h1>Talento Humano</h1>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/th-crear">
        <i class="fa-solid fa-circle-plus"></i>
        Agregar Usuario de TH
    </a>
</div>

<div class="dashboard__contenedor">
<?php if(!empty($anfitriones)) { ?>
    <table class="table">
        <thead class="table__thead">
            <tr>
                <th scope="col" class="table__th">ID</th>
                <th scope="col" class="table__th">Nombre</th>
                <th scope="col" class="table__th">Apellido Paterno</th>
                <th scope="col" class="table__th">Apellido Materno</th>
                <th scope="col" class="table__th">Fecha Inicio</th>
                <th scope="col" class="table__th">Estado</th>
                <th scope="col" class="table__th">Puesto</th>
                <th scope="col" class="table__th">Área</th>
                <th scope="col" class="table__th">Propiedad</th>
                <th scope="col" class="table__th"></th>
            </tr>
        </thead>

        <tbody class="table__tbody">
            <?php foreach($anfitriones as $anfitrion) { ?>
                <tr class="table__tr">
                    <td class="table__td">
                        <?php echo $anfitrion->id; ?>
                    </td>
                    <td class="table__td">
                        <?php echo $anfitrion->nombre; ?>
                    </td>
                    <td class="table__td">
                        <?php echo $anfitrion->apellidoPat; ?>
                    </td>
                    <td class="table__td">
                        <?php echo $anfitrion->apellidoMat; ?>
                    </td>
                    <td class="table__td">
                        <?php echo $anfitrion->fechaInicio; ?>
                    </td>
                    <td class="table__td">
                        <?php echo $anfitrion->estadoU->estado; ?>
                    </td>
                    <td class="table__td">
                        <?php echo $anfitrion->puesto->nombrePosicion; ?>
                    </td>
                    <td class="table__td">
                        <?php echo $anfitrion->area->nombreArea; ?>
                    </td>
                    <td class="table__td">
                        <?php echo $anfitrion->propiedad->nombrePropiedad; ?>
                    </td>

                    <td class="table__td--acciones">
                        <a class="table__accion table__accion--editar" href="/admin/th-actualizar?id=<?php echo $anfitrion->id; ?>">
                            <!-- <i class="fa-solid fa-user-pen"></i> -->
                            <i class="fa-solid fa-user-pen"></i>
                            Editar
                        </a>

                        <form method="POST" action="/admin/th-eliminar" class="table__formulario">
                            <input type="hidden" name="id" value="<?php echo $anfitrion->id; ?>">
                            <button class="table__accion table__accion--eliminar" type="submit">
                                <i class="fa-solid fa-user-slash"></i>
                                    Inactivar
                            </button>
                        </form>

                        <a class="table__accion table__accion--editar" href="/admin/th-privilegios?id=<?php echo $anfitrion->id; ?>">
                            <i class="fa-solid fa-user-gear"></i>
                            Privilegios
                        </a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <p class="text-center">Aún No Hay Usuarios de Talento Humano</p>
<?php } ?>
</div>

<?php 
echo $paginacion;
?>



