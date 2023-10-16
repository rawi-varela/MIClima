<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General</legend>

    <div class="formulario__campo">
        <label for="id" class="formulario__label">ID:</label>
        <input class="formulario__input" type="text" id="id" name="id" placeholder="ID Propiedad" value="<?php echo s($propiedad->id); ?>">
    </div>

    <div class="formulario__campo">
        <label for="nombrePropiedad" class="formulario__label">Nombre:</label>
        <input class="formulario__input" type="text" id="nombrePropiedad" name="nombrePropiedad" placeholder="Nombre Propiedad" value="<?php echo s($propiedad->nombrePropiedad); ?>">
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen:</label>
        <input class="formulario__input formulario__input--file" type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
    </div>   

    

    <?php if(isset($propiedad->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/imagenes/propiedades/' . $propiedad->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/imagenes/propiedades/' . $propiedad->imagen; ?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/imagenes/propiedades/' . $propiedad->imagen; ?>.png" alt="Imagen Propiedad">
            </picture>
        </div>
    <?php } ?>

    <div class="formulario__campo">
        <label for="tipoPropiedad" class="formulario__label">Tipo de Propiedad</label>
        <select name="tipoPropiedad_id" id="tipoPropiedad" class="formulario__select">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($tipoPropiedades as $tipoPropiedad) { ?> 
            <option 
                <?php echo $propiedad->tipoPropiedad_id === $tipoPropiedad->id ? 'selected' : '' ?> 
                value="<?php echo s($tipoPropiedad->id); ?>">
                <?php echo s($tipoPropiedad->tipo); ?>
        <?php  } ?>
        </select>  
    </div>
</fieldset>