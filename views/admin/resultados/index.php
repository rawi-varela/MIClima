
<h1>Resultados Evaluación MI Clima 2024</h1>

    <div class="resultados">
        <div class="resultados__genero">
            <?php foreach($conteoGeneros as $conteoGenero): ?>
                <p><?php echo htmlspecialchars($conteoGenero['genero']); ?> - <span><?php echo htmlspecialchars($conteoGenero['porcentaje']); ?>%</span></p>
            <?php endforeach; ?>
        </div>
        <div class="resultados__filtros">
            <select id="selectDepartamento">
                <option selected value="">Departamento</option>
                <?php foreach($areas as $area) { ?> 
                    <option value="<?php echo s($area->id); ?>">
                        <?php echo s($area->nombreDepartamento); ?>
                    </option>
                <?php } ?>
            </select>

            <select id="selectPeriodo">
                <option selected value="">Periodo</option>
                <?php foreach($periodos as $periodo) { ?> 
                    <option value="<?php echo s($periodo->id); ?>">
                        <?php echo s($periodo->periodo); ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="dashboard__contenedor">
    <?php if(!empty($globales)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Pregunta</th>
                    <th scope="col" class="table__th">Resultado Actual</th> 
                    <th scope="col" class="table__th">Diferencia</th>
                    <th scope="col" class="table__th">Resultado Anterior</th> 

                    <!-- <?php foreach($globales as $global) { ?>
                        <th scope="col" class="table__th"><?php echo $global->periodo; ?></th>
                    <?php } ?> -->
                </tr>
            </thead>

            <tbody class="table__tbody">
            <!-- Iterar sobre cada pregunta y mostrar las calificaciones correspondientes -->
            <!-- <?php for($i = 0; $i < 12; $i++) { ?>
                <tr class="table__tr">
                    Mostrar la pregunta -->
                    <!-- <td class="table__td-pregunta">
                        <?php echo $preguntas[$i]->pregunta; ?>
                    </td> -->

                    <!-- Mostrar las calificaciones de cada global para esta pregunta -->
                    <!-- <?php foreach($globales as $global) { ?>
                        <td class="table__td">
                            <?php echo $global->{"cp" . ($i + 1)} . "%"; ?>
                        </td>
                    <?php } ?>
                </tr> -->
            <!-- <?php } ?> -->
        </tbody>

        </table>
    <?php } else { ?>
        <p class="text-center">Aún No Hay Calificaciones</p>
    <?php } ?>

    <!--div oculto para usarlo en el JavaScript-->
    <div id="preguntas-container" style="display: none;">
    <?php foreach($preguntas as $pregunta) { ?>
        <span data-pregunta="<?php echo htmlspecialchars($pregunta->pregunta); ?>"></span>
    <?php } ?>
    </div>

</div>


