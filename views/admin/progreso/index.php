<main class="contenedor seccion">
    <h1>Progreso de Evaluación MI Clima 2024</h1>

    <div class="dashboard__contenedor">
    <?php if(!empty($areas)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">#</th>
                    <th scope="col" class="table__th">Departamento</th>
                    <th scope="col" class="table__th">Total No. de Anfitriones</th>
                    <th scope="col" class="table__th">Respuestas de Anfitriones</th>
                    <th scope="col" class="table__th">Anfitriones por responder</th>
                    <th scope="col" class="table__th">% de respuesta</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php $contador=0; foreach($areas as $area) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $contador+=1; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $area->nombreDepartamento; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $area->cantidad; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $area->evaluados; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $area->faltante; ?>
                        </td>
                        <td class="table__td">
                            <div class="table__progreso-contenedor">
                                <div class="table__progreso" style="width: <?php echo $area->porcentaje; ?>%;"></div>
                            </div>
                            <?php echo $area->porcentaje . "%"; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center">Aún No Hay Departamentos</p>
    <?php } ?>
</div>

</main>

