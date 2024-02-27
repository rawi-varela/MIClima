<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General del Administrador de TH</legend>

    <div class="formulario__campo">
        <label class="formulario__label" for="id">ID:</label>
        <input class="formulario__input" type="text" id="id" name="id" placeholder="ID Administrador" value="<?php echo s($administrador->id); ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="nombreAnfitrion">Nombre completo:</label>
        <input class="formulario__input" type="text" id="nombreAnfitrion" name="nombreAnfitrion" placeholder="Nombre Administrador" value="<?php echo s($administrador->nombreAnfitrion); ?>">
    </div>

    <div class="formulario__campo">
        <label class="formulario__label" for="contraseña">Contraseña:</label>
        <input class="formulario__input" type="password" id="contraseña" name="contraseña" placeholder="Contraseña" value="<?php echo s($administrador->contraseña); ?>">
    </div>

    <div class="formulario__campo">
        <label for="propiedad" class="formulario__label">Propiedad</label>
        <select name="propiedades_id" id="propiedad" class="formulario__select">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($propiedades as $propiedad) { ?> 
            <option 
            <?php echo $administrador->propiedades_id === $propiedad->id ? 'selected' : '' ?> 
            value="<?php echo s($propiedad->id); ?>">
            <?php echo s($propiedad->nombrePropiedad); ?>
        <?php  } ?>
        </select>  
    </div>
</fieldset>

