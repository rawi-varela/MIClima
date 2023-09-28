<fieldset>
    <legend>Información General</legend>

    <label for="id">ID:</label>
    <input type="text" id="id" name="id" placeholder="ID Propiedad" value="<?php echo s($propiedad->id); ?>">

    <label for="nombrePropiedad">Nombre:</label>
    <input type="text" id="nombrePropiedad" name="nombrePropiedad" placeholder="Nombre Propiedad" value="<?php echo s($propiedad->nombrePropiedad); ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

    <?php if($propiedad->imagen) { ?>
    <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
    <?php } ?>

    <label for="tipoPropiedad">Tipo de Propiedad</label>
    <select name="tipoPropiedad_id" id="tipoPropiedad">
    <option selected value="">-- Seleccione --</option>
    <?php foreach($tipoPropiedades as $tipoPropiedad) { ?> 
        <option 
            <?php echo $propiedad->tipoPropiedad_id === $tipoPropiedad->id ? 'selected' : '' ?> 
            value="<?php echo s($tipoPropiedad->id); ?>">
            <?php echo s($tipoPropiedad->tipo); ?>
    <?php  } ?>
    </select>  
</fieldset>