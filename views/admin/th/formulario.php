<fieldset>
    <legend>Información General</legend>

    <label for="id">ID:</label>
    <input type="text" id="id" name="id" placeholder="ID Anfitrión" value="<?php echo s($anfitrion->id); ?>">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre Anfitrión" value="<?php echo s($anfitrion->nombre); ?>">

    <label for="apellidoPat">Apellido Paterno:</label>
    <input type="text" id="apellidoPat" name="apellidoPat" placeholder="Apellido Paterno" value="<?php echo s($anfitrion->apellidoPat); ?>">

    <label for="apellidoMat">Apellido Materno:</label>
    <input type="text" id="apellidoMat" name="apellidoMat" placeholder="Apellido Materno" value="<?php echo s($anfitrion->apellidoMat); ?>">

    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" value="<?php echo s($anfitrion->contraseña); ?>">

    <label for="genero">Género</label>
    <select name="genero" id="genero">
        <option selected value="">-- Seleccione --</option>
        <option value="M"> Masculino</option>
        <option value="F"> Femenino</option>
    </select>

    <label for="fechaInicio">Fecha de Inicio</label>
    <input type="date" name="fechaInicio" placeholder="Fecha de Inicio" value="<?php echo s($anfitrion->fechaInicio); ?>">

    <label for="tipoUsuario">Tipo Usuario</label>
    <select name="tipoUsuario" id="tipoUsuario">
        <option selected value="2"> Talento Humano</option>
    </select>

    <label for="estadoUsuario">Estado Usuario</label>
    <select name="estadoUsuario_id" id="estadoUsuario">
    <option selected value="">-- Seleccione --</option>
    <?php foreach($estadoUsuarios as $estadoUsuario) { ?> 
        <option 
            <?php echo $anfitrion->estadoUsuario_id === $estadoUsuario->id ? 'selected' : '' ?> 
            value="<?php echo s($estadoUsuario->id); ?>">
            <?php echo s($estadoUsuario->estado); ?>
    <?php  } ?>
    </select>

    <label for="propiedad">Propiedad</label>
    <select name="propiedad_id" id="propiedad">
    <option selected value="">-- Seleccione --</option>
    <?php foreach($propiedades as $propiedad) { ?> 
        <option 
            <?php echo $area->propiedad_id === $propiedad->id ? 'selected' : '' ?> 
            value="<?php echo s($propiedad->id); ?>">
            <?php echo s($propiedad->nombrePropiedad); ?>
    <?php  } ?>
    </select> 

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

    <label for="puesto">Puesto</label>
    <select name="puesto_id" id="puesto">
    <option selected value="">-- Seleccione --</option>
    <?php foreach($puestos as $puesto) { ?> 
        <option 
            <?php echo $anfitrion->puesto_id === $puesto->id ? 'selected' : '' ?> 
            value="<?php echo s($puesto->id); ?>">
            <?php echo s($puesto->nombrePuesto); ?>
    <?php  } ?>
    </select> 

</fieldset>

<fieldset>
    <legend>Privilegios</legend>

</fieldset>