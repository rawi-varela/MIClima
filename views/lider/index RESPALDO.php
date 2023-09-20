<main class="contenedor">
    <a class="alinear-derecha" href="/logout">Cerrar Sesión</a>
    <h3>Bienvenido Usario: <?php echo $_SESSION['nombre']; ?> </h3>
    <p class="alinear-centro">Anfitriones</p>

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
                    <td><?php echo $anfitrion->area_id; ?></td>
                    <td><?php echo $anfitrion->posicion_id; ?></td>
                    <td><?php echo $anfitrion->propiedad_id; ?></td>
                    <td>
                        <a href="/lider/evaluacion?id=<?php echo $anfitrion->id; ?>" class="boton">Evaluar</a>
                        <a href="/lider/historial?id=<?php echo $anfitrion->id; ?>" class="boton">Historial</a>
                    </td>
                    <td>
                        <?php echo $opcion1; ?>
                        <?php echo $opcion2; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
		</table>
    </div>
</main>