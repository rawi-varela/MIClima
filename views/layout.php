<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KCHAT</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">

</head>

<header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
    <div class="contenedor contenido-header">
        <div class="barra">
            <a href="/">
            <img src="/build/img/logoMI.svg" width="200" height="90" alt="Logotipo de Mundo Imperial">
            </a>

            <div class="mobile-menu">
                <img src="/build/img/barras.svg" alt="icono menú responsive">
            </div>

            <div class="derecha">
                <nav class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/login">Iniciar Sesión</a>
                </nav>
            </div>
        </div> <!--.barra-->
    </div>
</header>

<body>

    <?php echo $contenido; ?>

<footer class="footer seccion">
    <p>Mundo Imperial</>
</footer>

<?php
    echo $script ?? '';
?> 

</body>
</html>