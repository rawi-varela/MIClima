<table class="anfitriones">
    <thead>
        <th>Identificación</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido materno</th>
        <th>Fecha Inicio</th>
        <th>Estado</th>
        <th>Área</th>
        <th>Posición</th>
        <th>Propiedad</th>
        <?php if(isset($ths)) { ?> <!-- Para la Tabla TH del Admin -->
        <th>Privilegios</th> 
        <?php } ?> 
        <th>Acciones</th>
	</thead>
    <tbody> <!--. Mostrar los resultados -->
    <?php foreach( $anfitriones as $anfitrion ): ?>
        <tr>
            <td><?php echo $anfitrion->id; ?></td>
            <td><?php echo $anfitrion->nombre; ?></td>
            <td><?php echo $anfitrion->apellidoPat; ?></td>
            <td><?php echo $anfitrion->apellidoMat; ?></td>
            <td><?php echo $anfitrion->fechaInicio; ?></td>
            <td><?php echo $anfitrion->estado; ?></td>
            <td><?php echo $anfitrion->area; ?></td>
            <td><?php echo $anfitrion->posicion; ?></td>
            <td><?php echo $anfitrion->propiedad; ?></td>   
            <?php if(isset($ths)) { ?>
                <td class="salto">
                    <?php foreach( $ths as $th ): ?>
                        <?php if($anfitrion->id === $th->anfitriones_id) { ?>
                            <span><?php echo $th->propiedad_id; ?> </span>
                        <?php } ?>
                <?php endforeach; ?>
                </td>
            <?php } ?>   
    <?php 
        // debuguear($_SERVER['PATH_INFO']);
        if($_SERVER['PATH_INFO'] === "/lider-perfil"){ ?>
            <td>
                <a href="/lider-evaluar?id=<?php echo $anfitrion->id; ?>" class="boton">Evaluar</a>
                <a href="/lider-historial?id=<?php echo $anfitrion->id; ?>" class="boton">Historial</a>
            </td>
        <?php } else if($_SERVER['PATH_INFO'] === "/th-administrar-anfitriones"){ ?>
            <td>
                <a href="/th-actualizar-anfitriones?id=<?php echo $anfitrion->id; ?>" class="boton">Editar</a>
                <a href="/th-deshabilitar-anfitriones?id=<?php echo $anfitrion->id; ?>" class="boton">Deshabilitar</a>
            </td>
        <?php } else if($_SERVER['PATH_INFO'] === "/th-administrar-anfitriones-deshabilitados"){ ?>
            <td>
                <a href="/th-actualizar-anfitriones?id=<?php echo $anfitrion->id; ?>" class="boton">Habilitar</a>
                <a href="/th/eliminar?id=<?php echo $anfitrion->id; ?>" class="boton">Eliminar</a>
            </td>
        <?php } else if($_SERVER['PATH_INFO'] === "/admin"){ ?>
            <td>
                <a href="/admin/editar?id=<?php echo $anfitrion->id; ?>" class="boton">Editar</a>
                <a href="/admin/eliminar?id=<?php echo $anfitrion->id; ?>" class="boton">Deshabilitar</a>
                <a href="/admin/th-privilegios?id=<?php echo $anfitrion->id; ?>" class="boton">Administrar Privilegios</a>
            </td>
        <?php } ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>