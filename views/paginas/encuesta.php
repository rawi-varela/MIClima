<main class="contenedor seccion">
    
    <!-- Sección de imagen y formulario -->
<div class="grid-contenedor">
    <picture>
        <source srcset="<?php echo $_ENV['HOST'] . '/build/img/Logo-mi-clima.webp'; ?>" type="image/webp">
        <source srcset="<?php echo $_ENV['HOST'] . '/build/img/Logo-mi-clima.png'; ?>" type="image/png">
        <img src="<?php echo $_ENV['HOST'] . '/build/img/Logo-mi-clima.png'; ?>" alt="Logo Mi Clima">
    </picture>

        <section class="contenedor-encuesta">
            <form class="" method="POST" action="/encuesta">
                <h3>Datos demograficos</h3>
                <p>Estimado anfitrión, le agradecemos su interés en participar en la evaluación MI Clima.</p>

        <div class="encuesta__formulario">
            <div class="encuesta__campo">
                <label for="propiedad" class="encuesta__label">Propiedad</label>
                <select name="periodos_id" id="propiedad" class="encuesta__select" required>
                <option selected value="">-- Seleccione --</option>
                <?php foreach($propiedades as $propiedad) { ?> 
                    <option 
                    <?php echo $resultado->periodos_id === $propiedad->id ? 'selected' : '' ?> 
                    value="<?php echo s($propiedad->id); ?>">
                    <?php echo s($propiedad->nombrePropiedad); ?>
                <?php  } ?>
                </select>  
            </div>

            <div class="encuesta__campo">
                <label for="departamento" class="encuesta__label">Departamento</label>
                <select name="departamentos_id" id="departamento" class="encuesta__select" required>
                    <option selected value="">-- Seleccione --</option>
                    <!-- Las opciones se llenarán con JavaScript -->
                </select>  
            </div>

            
            <div class="encuesta__campo">
                <label for="genero" class="encuesta__label">Género</label>
                <select name="genero" id="genero" class="encuesta__select" required>
                <option selected value="">-- Seleccione --</option>
                <?php foreach($generos as $genero) { ?> 
                    <option 
                    <?php echo $resultado->genero === $genero->genero ? 'selected' : '' ?> 
                    value="<?php echo s($genero->genero); ?>">
                    <?php echo s($genero->genero); ?>
                <?php  } ?>
                </select>  
            </div>

            <div class="encuesta__campo">
                <label for="edad" class="encuesta__label">Edad</label>
                <select name="edad" id="edad" class="encuesta__select" required>
                <option selected value="">-- Seleccione --</option>
                <?php foreach($edades as $edad) { ?> 
                    <option 
                    <?php echo $resultado->edad === $edad->edad ? 'selected' : '' ?> 
                    value="<?php echo s($edad->edad); ?>">
                    <?php echo s($edad->edad); ?>
                <?php  } ?>
                </select>  
            </div>
            <div class="encuesta__campo">
                <label for="tipoPuesto" class="encuesta__label">Tipo de Puesto</label>
                <select name="tipoPuesto" id="tipoPuesto" class="encuesta__select" required>
                <option selected value="">-- Seleccione --</option>
                <?php foreach($tipoPuestos as $tipoPuesto) { ?> 
                    <option 
                    <?php echo $resultado->tipoPuesto === $tipoPuesto->tipoPuesto ? 'selected' : '' ?> 
                    value="<?php echo s($tipoPuesto->tipoPuesto); ?>">
                    <?php echo s($tipoPuesto->tipoPuesto); ?>
                <?php  } ?>
                </select>  
            </div>

            <div class="encuesta__campo">
                <label for="antiguedad" class="encuesta__label">Antigüedad</label>
                <select name="antiguedad" id="antiguedad" class="encuesta__select" required>
                <option selected value="">-- Seleccione --</option>
                <?php foreach($antiguedades as $antiguedad) { ?> 
                    <option 
                    <?php echo $resultado->antiguedad === $antiguedad->antiguedad ? 'selected' : '' ?> 
                    value="<?php echo s($antiguedad->antiguedad); ?>">
                    <?php echo s($antiguedad->antiguedad); ?>
                <?php  } ?>
                </select>  
            </div>
        </div> <!--.encuesta__formulario -->
        </section>
</div> <!--.grid-contenedor -->  

    <!-- Sección de preguntas -->
    <div class="encuesta__preguntas">
        <h3>Evaluación MI Clima Laboral 2024</h3>

        <?php foreach($preguntas as $pregunta) { ?>   
        <div class="col" required>
            <p class="pregunta"><span><?php echo ($contador+=1) . '. ';?></span><?php echo $pregunta->pregunta; ?></p>

            <!-- Totalmente de acuerdo = Positivo -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="p<?php echo $pregunta->id; ?>" id="p<?php echo $pregunta->id; ?>-positivo" value="Positivo" required>
                <label class="form-check-label" for="p<?php echo $pregunta->id; ?>-positivo">Totalmente de acuerdo</label>
            </div>

            <!-- De acuerdo = Positivo -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="p<?php echo $pregunta->id; ?>" id="p<?php echo $pregunta->id; ?>-positivo2" value="Positivo">
                <label class="form-check-label" for="p<?php echo $pregunta->id; ?>-positivo2">De acuerdo</label>
            </div>

            <!-- Ni en acuerdo, ni en desacuerdo = Neutro -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="p<?php echo $pregunta->id; ?>" id="p<?php echo $pregunta->id; ?>-neutro" value="Neutro">
                <label class="form-check-label" for="p<?php echo $pregunta->id; ?>-neutro">Ni en acuerdo, ni en desacuerdo</label>
            </div>

            <!-- En desacuerdo = Negativo -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="p<?php echo $pregunta->id; ?>" id="p<?php echo $pregunta->id; ?>-negativo" value="Negativo">
                <label class="form-check-label" for="p<?php echo $pregunta->id; ?>-negativo">En desacuerdo</label>
            </div>

            <!-- Totalmente en desacuerdo = Negativo -->
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="p<?php echo $pregunta->id; ?>" id="p<?php echo $pregunta->id; ?>-negativo2" value="Negativo">
                <label class="form-check-label" for="p<?php echo $pregunta->id; ?>-negativo2">Totalmente en desacuerdo</label>
            </div>
        </div>
        <?php } ?>


    </div>

    <div class="enviar">
        <input type="submit" value="Enviar" class="encuesta__submit">
    </div>
    </form>
</main>



