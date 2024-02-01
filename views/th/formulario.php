<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="id">ID:</label>
        <input class="formulario__input" type="text" id="id" name="id" placeholder="ID Anfitrión" value="<?php echo s($anfitrion->id); ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="nombre">Nombre:</label>
        <input class="formulario__input" type="text" id="nombre" name="nombre" placeholder="Nombre Anfitrión" value="<?php echo s($anfitrion->nombre); ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="apellidoPat">Apellido Paterno:</label>
        <input class="formulario__input" type="text" id="apellidoPat" name="apellidoPat" placeholder="Apellido Paterno" value="<?php echo s($anfitrion->apellidoPat); ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="apellidoMat">Apellido Materno:</label>
        <input class="formulario__input" type="text" id="apellidoMat" name="apellidoMat" placeholder="Apellido Materno" value="<?php echo s($anfitrion->apellidoMat); ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="contraseña">Contraseña:</label>
        <input class="formulario__input" type="password" id="contraseña" name="contraseña" placeholder="Contraseña" value="<?php echo s($anfitrion->contraseña); ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="fechaInicio">Fecha de Inicio</label>
        <input class="formulario__input" type="date" name="fechaInicio" placeholder="Fecha de Inicio" value="<?php echo s($anfitrion->fechaInicio); ?>">
    </div>
   
    <div class="formulario__campo">
        <label class="formulario__label" for="tipoUsuario">Tipo Usuario</label>
        <select class="formulario__select" name="tipoUsuario_id" id="tipoUsuario">
            <option selected value="">-- Seleccione --</option>
            <option <?php echo $anfitrion->tipoUsuario_id === '1' ? 'selected' : '' ?>  value="1">ANFITRIÓN</option>
            <option <?php echo $anfitrion->tipoUsuario_id === '2' ? 'selected' : '' ?>  value="2">LIDER</option>
        </select>
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="estadoUsuario">Estado Usuario</label>
        <select class="formulario__select" name="estadoUsuario_id" id="estadoUsuario">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($estadoUsuarios as $estadoUsuario) { ?> 
            <option 
                <?php echo $anfitrion->estadoUsuario_id === $estadoUsuario->id ? 'selected' : '' ?> 
                value="<?php echo s($estadoUsuario->id); ?>">
                <?php echo s($estadoUsuario->estado); ?>
        <?php  } ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="propiedad">Unidad de Negocio</label>
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
        
    <div class="formulario__campo">
        <label class="formulario__label" for="posicion">Puesto</label>
        <select class="formulario__select" name="posicion_id" id="posicionSelect">
            <option selected value="">-- Seleccione --</option>
        </select>
    </div>
</fieldset>

