<div class="seccion-anfitriones">
        <table class="anfitriones">
            <thead>
                <th>Identificación</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido materno</th>
                <th>Genero</th>
                <th>Fecha Inicio</th>
                <th>Estado</th>
                <th>Área</th>
                <th>Posición</th>
                <th>Propiedad</th>
                <th>Opciones</th>
			</thead>
            <tbody> <!--. Mostrar los resultados -->
            <?php foreach( $anfitriones as $anfitrion ): ?>
                <tr>
                    <td><?php echo $anfitrion->id; ?></td>
                    <td><?php echo $anfitrion->nombre; ?></td>
                    <td><?php echo $anfitrion->apellidoPat; ?></td>
                    <td><?php echo $anfitrion->apellidoMat; ?></td>
                    <td><?php echo $anfitrion->genero; ?></td>
                    <td><?php echo $anfitrion->fechaInicio; ?></td>
                    <td><?php echo $anfitrion->estado; ?></td>
                    <td><?php echo $anfitrion->area; ?></td>
                    <td><?php echo $anfitrion->posicion; ?></td>
                    <td><?php echo $anfitrion->propiedad; ?></td>
                    
                    <?php 
                    // debuguear($_SESSION);
                    if(array_key_exists('lider', $_SESSION)){ ?>
                        <td>
                            <a href="/lider/evaluacion?id=<?php echo $anfitrion->id; ?>" class="boton">Evaluar</a>
                            <a href="/lider/historial?id=<?php echo $anfitrion->id; ?>" class="boton">Historial</a>
                        </td>
                    <?php } else { ?> 
                        <td>
                            <a href="/th/editar?id=<?php echo $anfitrion->id; ?>" class="boton">Editar</a>
                            <a href="/th/eliminar?id=<?php echo $anfitrion->id; ?>" class="boton">Eliminar</a>
                        </td>
                    <?php } ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
		</table>
    </div>