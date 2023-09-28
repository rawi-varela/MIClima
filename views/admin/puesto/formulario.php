<fieldset>
    <legend>Información General</legend>

    <label for="id">ID:</label>
    <input type="text" id="id" name="id" placeholder="ID Puesto" value="<?php echo s($puesto->id); ?>">

    <label for="nombrePosicion">Nombre:</label>
    <input type="text" id="nombrePosicion" name="nombrePosicion" placeholder="Nombre Puesto" value="<?php echo s($puesto->nombrePosicion); ?>">

    <label for="area">Área</label>
    <select name="area_id" id="area">
    <option selected value="">-- Seleccione --</option>
    <?php foreach($areas as $area) { ?> 
        <option 
            <?php echo $puesto->area_id === $area->id ? 'selected' : '' ?> 
            value="<?php echo s($area->id); ?>">
            <?php echo s($area->nombreArea); ?>
    <?php  } ?>
    </select> 

    <label for="tipoEmpleado">Tipo de Empleado</label>
    <select name="tipoEmpleado_id" id="tipoEmpleado">
    <option selected value="">-- Seleccione --</option>
    <?php foreach($tipoEmpleados as $tipoEmpleado) { ?> 
        <option 
            <?php echo $puesto->tipoEmpleado_id === $tipoEmpleado->id ? 'selected' : '' ?> 
            value="<?php echo s($tipoEmpleado->id); ?>">
            <?php echo s($tipoEmpleado->tipo); ?>
    <?php  } ?>
    </select>  
</fieldset>