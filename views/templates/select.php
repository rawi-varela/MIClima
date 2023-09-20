<div class="contenedor-select">
   <!-- Select para elegir el área -->
	<select name="area" id="area">
	    <option value="" selected>-- Seleccione un Área --</option>
	        <?php foreach($areas as $area) { ?>
		        <option value="<?php echo $area->id; ?>"><?php echo $area->nombreArea; ?></option>
		    <?php } ?>
	</select>

	<!-- Select para elegir la posición -->
	<select name="posicion" id="posicion">
	    <option value="" selected>-- Seleccione una Posición --</option>
		<?php foreach($posiciones as $posicion) { ?>
		        <option value="<?php echo $posicion->id; ?>"><?php echo $posicion->nombrePosicion; ?></option>
	    <?php } ?>
	</select>

	<!-- Select para elegir la posición -->
	<select name="posicion" id="posicion">
	    <option value="" selected>-- Seleccione un Área --</option>
		<?php foreach($areas as $area) { ?>
		        <option value="<?php echo $area->id; ?>"><?php echo $area->nombreArea; ?></option>
	    <?php } ?>
	</select>
</div>
