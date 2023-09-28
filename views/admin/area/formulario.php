<fieldset>
    <legend>Información General</legend>

    <label for="id">ID:</label>
    <input type="text" id="id" name="id" placeholder="ID Área" value="<?php echo s($area->id); ?>">

    <label for="nombreArea">Nombre:</label>
    <input type="text" id="nombreArea" name="nombreArea" placeholder="Nombre Área" value="<?php echo s($area->nombreArea); ?>">

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
</fieldset>