<main class="contenedor">
    <h2>Historial de Evaluaciones</h2>

	<div class="alinear-centro">
		<select name="" id="" class="formulario__select">
			<option value="">-- Año de Evaluación --</option>
			<option value="">2023</option>
		</select>
	</div>

    <div class="contenedor perfil-anfitrion">
        <div class="tabla-izq">
            <p>Nombre: <?php echo $anfitrion->nombre . " " . $anfitrion->apellidoPat . " " . $anfitrion->apellidoMat ?> </p>
			<p>Área: <?php echo $anfitrion->area->nombreArea ?> </p>
            <p>Posición: <?php echo $anfitrion->posicion->nombrePosicion; ?> </p>

            <form action="" class="formulario">
            <form class="formulario" method="POST" action="/lider-historial" enctype="multipart/form-data">
                <div class="formulario__campo">
                    <label for="imagen" class="formulario__label">Imagen:</label>
                    <input class="formulario__input formulario__input--file" type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
                </div>
                <input type="submit" value="Subir Imagen" class="generarPDF">

            </form>
        </div>

        <div class="tabla-der">
			<p class="kchat">K.C.H.A.T</p>
			<table class="anfitrion-resultados">
			<thead>
                <tr>
					<th>Año de Evaluación</th>
					<td><?php echo $anfitrion->compromiso ?? '2023' ?></td>
				</tr>
                <tr>
					<th>Identificación</th>
					<td><?php echo $anfitrion->compromiso ?? 'VALR011220IL8' ?></td>
				</tr>
                <tr>
					<th>Calificación Final</th>
					<td><?php echo $anfitrion->compromiso ?? '0' ?></td>
				</tr>
                <tr>
					<th>Nivel Esperado</th>
					<td><?php echo $anfitrion->compromiso ?? '0' ?></td>
				</tr>
                <tr>
					<th>Desviación</th>
					<td><?php echo $anfitrion->compromiso ?? '0' ?></td>
				</tr>
				<tr class="competencias">
	            	<th>Compromiso</th>
	        		<td><?php echo $anfitrion->compromiso ?? '0' ?></td>
				</tr>
				<tr class="hidden">
					<th>ES RESPONSABLE / CUMPLIR EN TIEMPO Y FORMA</th>
					<td><?php echo isset($listac['r1']) ? $listac['r1'] : '0';?></td>
				</tr>
				<tr class="hidden">
					<th>AUTOEXIGENCIA CALIDAD</th>
					<td><?php echo isset($listac['r2']) ? $listac['r2'] : '0';?></td>
				</tr>
				<tr class="hidden">
					<th>AUTO CORRECCION/ ACEPTA SUS ERRORES</th>
					<td><?php echo isset($listac['r3']) ? $listac['r3'] : '0';?></td>
				</tr>
				<tr class="hidden">
					<th>PROACTIVIDAD / Se Anticipa, Demuestra total disposicion para colaborarar</th>
					<td><?php echo isset($listac['r4']) ? $listac['r4'] : '0';?></td>
				</tr>
				<tr class="competencias">
	            	<th>Integridad</th>
	        		<td><?php echo $anfitrion->integridad ?? '0' ?></td>
				</tr>
					<tr class="hidden">
						<th>DISCRESION</th>
						<td><?php echo isset($listac['r5']) ? $listac['r5'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>CONFIDENCIALIDAD</th>
						<td><?php echo isset($listac['r6']) ? $listac['r6'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>HONESTIDAD Y ETICA</th>
						<td><?php echo isset($listac['r7']) ? $listac['r7'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>Política Lost & Found</th>
						<td><?php echo isset($listac['r7']) ? $listac['r7'] : '0';?></td>
					</tr>
				<tr class="competencias">
	            	<th>Pasion por lo Extraordionario</th>
	        		<td><?php echo $anfitrion->pasion ?? '0' ?></td>
				</tr>
					<tr class="hidden">
						<th>ORIENTACION AL SERVICIO PERSONALIZADO INTERNO Y EXTERNO</th>
						<td><?php echo isset($listac['r8']) ? $listac['r8'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>SONRISA Y CONTACCTO VISUAL EFECTIVO</th>
						<td><?php echo isset($listac['r9']) ? $listac['r9'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>BRINDA ALTERNATIVAS Y SOPLUCIONES</th>
						<td><?php echo isset($listac['r10']) ? $listac['r10'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>ANTICIPACIÓN  A NECESIDADES DEL CLIENTE</th>
						<td><?php echo isset($listac['r11']) ? $listac['r11'] : '0';?></td>
					</tr>
				<tr class="competencias">
	            	<th>Sinergia / Trabajo en Equipo</th>
	        		<td><?php echo $anfitrion->sinergia ?? '0' ?></td>
				</tr>
					<tr class="hidden">
						<th>RESOLUCION DE CONFLICTOS</th>
						<td><?php echo isset($listac['r12']) ? $listac['r12'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>ARMONIZA, COLABORA CON COMPAÑEROS</th>
						<td><?php echo isset($listac['r13']) ? $listac['r13'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>COORDINACIPON DE TALENTOS Y TAREAS</th>
						<td><?php echo isset($listac['r14']) ? $listac['r14'] : '0';?></td>
					</tr>
				<tr class="competencias">
	            	<th>Maestria Emocional</th>
	        		<td><?php echo $anfitrion->calificacionFinal ?? '0' ?></td>
						<tr class="hidden">
							<th>MANEJO DE EMOCIONES/ LAS EXPRESA  ADECUADAMENTE</th>
							<td><?php echo isset($listac['r15']) ? $listac['r15'] : '0';?></td>
						</tr>
						<tr class="hidden">
							<th>MUESTRA AUTODOMINIO EN SISTUACIONES DIFICILES </th>
							<td><?php echo isset($listac['r16']) ? $listac['r16'] : '0';;?></td>
						</tr>
						<tr class="hidden">
							<th>DEDICA TIEMPO  PARA EL MANEJO DE SU ESTRÉS</th>
							<td><?php echo isset($listac['r17']) ? $listac['r17'] : '0';?></td>
						</tr>
				<tr class="competencias">
	            	<th>Comunicación Empática</th>
	        		<td><?php echo $anfitrion->calificacionFinal ?? '0' ?></td>
				</tr>
					<tr class="hidden">
						<th>TECNICAS DE ESCUCHA ACTIVA/ PONER ATENCION LAS OPINIONES PARA ESTABLECER ACUERDOS</th>
						<td><?php echo isset($listac['r18']) ? $listac['r18'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>RELACIONES SINDICALES</th>
						<td><?php echo isset($listac['r19']) ? $listac['r19'] : '0';?></td>
					</tr>
				<tr class="competencias">
	            	<th>Efectividad</th>
	        		<td><?php echo $anfitrion->efectividad ?? '0' ?></td>
				</tr>
					<tr class="hidden">
						<th>CUMPLIMEINTO DE KPI/ OBJETIVOS</th>
						<td><?php echo isset($listac['r27']) ? $listac['r27'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>MANEJO DE TIEMPO</th>
						<td><?php echo isset($listac['r28']) ? $listac['r28'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>SENTIDO DE URGENCIA/ VELOCIDAD</th>
						<td><?php echo isset($listac['r29']) ? $listac['r29'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>AUTOGESTION</th>
						<td><?php echo isset($listac['r30']) ? $listac['r30'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>SEGUIMIENTO</th>
						<td><?php echo isset($listac['r31']) ? $listac['r31'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>CONTROL Y MANEJO DE PRESUPUESTO</th>
						<td><?php echo isset($listac['r32']) ? $listac['r32'] : '0';?></td>
					</tr>
				<tr class="competencias">
	            	<th>Liderazgo y Desarrollo de Anfitriones</th>
	        		<td><?php echo $anfitrion->liderazgo ?? '0' ?></td>
				</tr>
					<tr class="hidden">
						<th>INDUCCION/ENTRENAMIENTO</th>
						<td><?php echo isset($listac['r20']) ? $listac['r20'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>PENSAMIENTO EJECUTIVO</th>
						<td><?php echo isset($listac['r21']) ? $listac['r21'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>TECNICAS DE INSTRUCCIÓN/ TRAIN THE TRAINER</th>
						<td><?php echo isset($listac['r22']) ? $listac['r22'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>CLARIFICA Y MONITORIA EL CUMPLIMIENTO DE OBJETIVOS DEL EQUIPO</th>
						<td><?php echo isset($listac['r23']) ? $listac['r23'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>RECONOCE EL ESFUERZO</th>
						<td><?php echo isset($listac['r24']) ? $listac['r24'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>RETROALIMENTACION SOBRE EL DESEMPEÑO</th>
						<td><?php echo isset($listac['r25']) ? $listac['r25'] : '0';?></td>
					</tr>
					<tr class="hidden">
						<th>PLANES DE DESARROLLO / PARA EL EQUIPO</th>
						<td><?php echo isset($listac['r26']) ? $listac['r26'] : '0';?></td>
					</tr>
				
				<tr class="competencias">
	            	<th>Funciones Específicas del Área</th>
	        		<td><?php echo $anfitrion->funciones_esp_area ?? '0' ?></td>
				</tr>
			</thead>
			</table>
        </div>
    </div>
	<button class="generarPDF" onclick="window.open('anfitrion-PDF', '_blank')">Generar PDF</button>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Encuentra todas las filas con la clase "hidden"
    const filasOcultas = document.querySelectorAll("tr.hidden");
    
    // Agrega un evento de clic a cada fila de "competencias"
    document.querySelectorAll("tr.competencias").forEach(function(filaCompetencias) {
        filaCompetencias.addEventListener("click", function() {
            // Encuentra todas las filas ocultas bajo la fila de "competencias" actual
            const filasOcultasDeEstaCompetencia = [];
            let siguienteFila = filaCompetencias.nextElementSibling;
            
            // Recorre y almacena todas las filas ocultas
            while (siguienteFila && siguienteFila.classList.contains("hidden")) {
                filasOcultasDeEstaCompetencia.push(siguienteFila);
                siguienteFila = siguienteFila.nextElementSibling;
            }
            
            // Muestra u oculta las filas ocultas bajo la fila de "competencias" actual
            filasOcultasDeEstaCompetencia.forEach(function(filaOculta) {
                filaOculta.style.display = (filaOculta.style.display === "none" || filaOculta.style.display === "") ? "table-row" : "none";
            });
        });
    });
});
</script>
