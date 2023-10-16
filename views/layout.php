
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KCHAT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                    <?php if(!is_auth() and !is_admin()): ?>
                        <a href="/login">Iniciar Sesión</a>
                    <?php endif; ?>
                    <?php if(is_admin()): ?>
                        <a href="/admin/dashboard">Administrar</a>
                    <?php endif; ?>
                    <?php if(is_th() || is_thlider()): ?>
                        <a href="/th-perfil">Inicio</a>
                    <?php endif; ?>
                    <?php if(is_lider() || is_thlider()): ?>
                        <a href="/lider-perfil">Lider</a>
                    <?php endif; ?>
                    <?php if(is_lider() || is_thlider() || is_th() || is_anfitrion()): ?>
                        <a href="/anfitrion-perfil">Anfitrión</a>
                    <?php endif; ?>
                    <?php if(is_auth()): ?>
                        <!-- <a href="/logout">Cerrar Sesión</a> -->
                        <a>
                        <form method="POST" action="/logout" class="header-form">
                            <input type="submit" value="Cerrar Sesión" class="header-submit">
                        </form>
                        </a>
                    <?php endif; ?>
                </nav>
            </div>
        </div> <!--.barra-->
    </div>
</header>

<body>

    <?php echo $contenido; ?>
    
<footer class="footer seccion">
    <p>Mundo Imperial</p>
</footer>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        once: true
    });
</script>

<script src="/build/js/app.js" defer></script>

</body>
</html>