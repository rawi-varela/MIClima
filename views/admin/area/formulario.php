<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General</legend>

    <div class="formulario__campo">
        <label for="id" class="formulario__label">ID:</label>
        <input class="formulario__input" type="text" id="id" name="id" placeholder="ID Área" value="<?php echo s($area->id); ?>">
    </div>

    <div class="formulario__campo">
        <label for="nombreArea" class="formulario__label">Nombre:</label>
        <input class="formulario__input" type="text" id="nombreArea" name="nombreArea" placeholder="Nombre Área" value="<?php echo s($area->nombreArea); ?>">
    </div>

    <div class="formulario__campo">
        <label for="propiedad" class="formulario__label">Propiedad</label>
        <select name="propiedad_id" id="propiedad" class="formulario__select">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($propiedades as $propiedad) { ?> 
            <option 
            <?php echo $area->propiedad_id === $propiedad->id ? 'selected' : '' ?> 
            value="<?php echo s($propiedad->id); ?>">
            <?php echo s($propiedad->nombrePropiedad); ?>
        <?php  } ?>
        </select>  
    </div>
</fieldset>