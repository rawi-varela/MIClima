<?php
    if(!isset($_SESSION)) { // Verificar si ya hay sesión
        session_start(); //Para tener acceso a $_SESSION
    }
    
    $auth = $_SESSION['login'] ?? false; // ?? si no existe asignar de placeholder false a la variable auth
    $admin = $_SESSION['admin'] ?? false; // ?? si no existe asignar de placeholder false 

    if(!isset($inicio)) {
        $inicio = false;
    }
    //Validar si estamos en login.php
    $login = $_SERVER['PHP_SELF'];
?>

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
                    <?php if(!$auth && !$admin): ?>
                        <a href="/login">Iniciar Sesión</a>
                    <?php endif; ?>
                    <?php if($admin): ?>
                        <a href="/admin">Administrar</a>
                    <?php endif; ?>
                    <?php if($auth || $admin): ?>
                        <a href="/logout">Cerrar Sesión</a>
                    <?php endif; ?>
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