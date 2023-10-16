<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="id">ID:</label>
        <input class="formulario__input" type="text" id="id" name="id" placeholder="ID Puesto" value="<?php echo s($puesto->id); ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="nombrePosicion">Nombre:</label>
        <input class="formulario__input" type="text" id="nombrePosicion" name="nombrePosicion" placeholder="Nombre Puesto" value="<?php echo s($puesto->nombrePosicion); ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="propiedad">Propiedad</label>
        <select class="formulario__select" name="propiedad_id" id="propiedadSelect">
            <option selected value="">-- Seleccione --</option>
        </select>
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="area">Área</label>
        <select class="formulario__select" name="area_id" id="areaSelect" >
            <option selected value="">-- Seleccione --</option>
        </select>
    </div>

        <!-- <label class="formulario__label" for="area">Área</label>
        <select class="formulario__select" name="area_id" id="area">
        <option selected value="">-- Seleccione --</option>
        <?php //foreach($areas as $area) { ?> 
            <option 
                <?php //echo $puesto->area_id === $area->id ? 'selected' : '' ?> 
                value="<?php //echo s($area->id); ?>">
                <?php //echo s($area->nombreArea); ?>
        <?php  //} ?>
        </select>  -->

    <div class="formulario__campo">
        <label class="formulario__label" for="tipoEmpleado">Nivel de Puesto</label>
        <select class="formulario__select" name="tipoEmpleado_id" id="tipoEmpleado">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($tipoEmpleados as $tipoEmpleado) { ?> 
            <option 
                <?php echo $puesto->tipoEmpleado_id === $tipoEmpleado->id ? 'selected' : '' ?> 
                value="<?php echo s($tipoEmpleado->id); ?>">
                <?php echo s($tipoEmpleado->tipo); ?>
        <?php  } ?>
        </select>  
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="idLider">ID Posición del Líder:</label>
        <input class="formulario__input" type="text" id="idLider" name="idLider" placeholder="ID Puesto Líder" value="<?php echo s($puesto->idLider); ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="posicionLider">Nombre:</label>
        <input class="formulario__input" type="text" id="posicionLider" name="posicionLider" placeholder="Nombre Puesto Líder" value="<?php echo s($puesto->posicionLider); ?>">
    </div>
</fieldset>