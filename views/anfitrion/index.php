<?php

	// debuguear($datos);

?>

<main class="contenedor">
	<a class="btnNavegacion alinear-derecha" href="/logout">Cerrar Sesión</a>
    <h2>Perfil Anfitrión</h2>

    <div class="contenedor perfil-anfitrion">
        <div class="tabla-izq">
            <p>Usuario: <?php echo $_SESSION['id']; ?> </p>
            <p>Nombre: <?php echo $_SESSION['nombre']; ?> </p>
			<?php foreach ($datos as $dato) :?>
					<p>Área: <?php echo $dato->area ?> </p>
            		<p>Posición: <?php echo $dato->posicion; ?> </p>
			<?php endforeach; //Necesario el foreach puesto que es un array / viene de SQL PLANO?>

            <table>
				<thead class="thead-izq">
                <tr>
                    <th>Competencias Estándar del Mundo Imperial</th>
                    <td><?php echo $anfitrion->calificacionFinal ?></td>
                </tr>
                <tr>
                    <th>Nivel Esperado Indivudual</th>
                    <td><?php echo $anfitrion->nivelEsperado ?></td>
                </tr>
                <tr>
                    <th>Desviación Individual</th>
                    <td><?php echo $anfitrion->desviacion ?></td>
                </tr>
				</thead>
            </table>
        </div>

        <div class="tabla-der">
			<p class="kchat">K.C.H.A.T</p>
			<table>
			<thead>
				<tr>
					<th>Competencias</th>
					<th>Calificacion</th>
				</tr>
				<tr class="competencias">
	            	<th>Compromiso</th>
	        		<td><?php echo $anfitrion->compromiso ?></td>
				</tr>
				<tr class="competencias">
	            	<th>Integridad</th>
	        		<td><?php echo $anfitrion->integridad ?></td>
				</tr>
				<tr class="competencias">
	            	<th>Pasion por lo Extraordionario</th>
	        		<td><?php echo $anfitrion->pasion ?></td>
				</tr>
				<tr class="competencias">
	            	<th>Sinergia / Trabajo en Equipo</th>
	        		<td><?php echo $anfitrion->sinergia ?></td>
				</tr>
				<tr class="competencias">
	            	<th>Maestria Emocional</th>
	        		<td><?php echo $anfitrion->calificacionFinal ?></td>
				</tr>
				<tr class="competencias">
	            	<th>Comunicación Empática</th>
	        		<td><?php echo $anfitrion->calificacionFinal ?></td>
				</tr>
				<tr class="competencias">
	            	<th>Liderazgo y Desarrollo de Anfitriones</th>
	        		<td><?php echo $anfitrion->liderazgo ?></td>
				</tr>
				<tr class="competencias">
	            	<th>Efectividad</th>
	        		<td><?php echo $anfitrion->efectividad ?></td>
				</tr>
				<tr class="competencias">
	            	<th>Funciones Específicas del Área</th>
	        		<td><?php echo $anfitrion->funciones_esp_area ?></td>
				</tr>
			</thead>
			</table>
        </div>
    </div>
	<button class="generarPDF" onclick="window.open('anfitrion-PDF', '_blank')">Generar PDF</button>
</main>
		