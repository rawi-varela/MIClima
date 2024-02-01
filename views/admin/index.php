<h1>Inicio</h1>

<section class="resumen">
    <div class="resumen__imagen">
        <!-- <picture>
            <source srcset="<?php echo $_ENV['HOST'] . '/build/img/header.webp';?>" type="image/webp">
            <source srcset="<?php echo $_ENV['HOST'] . '/build/img/header.jpg';?>" type="image/jpeg">
            <img loading="lazy" src="<?php echo $_ENV['HOST'] . '/build/img/header.jpg';?>.jpg" alt="Propiedades">
        </picture> -->
    </div>

    <div class="resumen__grid">
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $propiedadesTotal; ?></p>
            <p class="resumen__texto">Unidades de Negocio</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $areasTotal; ?></p>
            <p class="resumen__texto">Departamentos</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $puestosTotal; ?></p>
            <p class="resumen__texto">Puestos</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $anfitrionesTotal ?></p>
            <p class="resumen__texto">Anfitriones</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $userThTotal; ?></p>
            <p class="resumen__texto">Usuarios TH</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $lideresTotal; ?></p>
            <p class="resumen__texto">Líderes</p>
        </div>
    </div>
</section>

