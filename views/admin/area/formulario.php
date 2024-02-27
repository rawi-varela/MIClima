<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General</legend>

    <div class="formulario__campo">
        <label for="id" class="formulario__label">ID:</label>
        <input class="formulario__input" type="text" id="id" name="id" placeholder="ID Departamento" value="<?php echo s($area->id); ?>">
    </div>

    <div class="formulario__campo">
        <label for="nombreDepartamento" class="formulario__label">Nombre:</label>
        <input class="formulario__input" type="text" id="nombreDepartamento" name="nombreDepartamento" placeholder="Nombre Departamento" value="<?php echo s($area->nombreDepartamento); ?>">
    </div>

    <div class="formulario__campo">
        <label for="propiedad" class="formulario__label">Unidad de Negocio</label>
        <select name="propiedades_id" id="propiedad" class="formulario__select">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($propiedades as $propiedad) { ?> 
            <option 
            <?php echo $area->propiedades_id === $propiedad->id ? 'selected' : '' ?> 
            value="<?php echo s($propiedad->id); ?>">
            <?php echo s($propiedad->nombrePropiedad); ?>
        <?php  } ?>
        </select>  
    </div>


    <div class="formulario__campo">
        <label for="cantidad" class="formulario__label">Número de Anfitriones:</label>
        <input class="formulario__input" type="text" id="cantidad" name="cantidad" placeholder="Número de Anfitriones" value="<?php echo s($area->cantidad); ?>">
    </div>
</fieldset>



