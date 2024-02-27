<header class="dashboard__header">
    <!-- <div class="dashboard__header-grid">
        <a href="/">
            <img src="/build/img/logoMI.svg" width="160" height="72" alt="Logotipo de Mundo Imperial" class="dashboard__logo">
        </a>

        <nav class="dashboard__nav">
            <form method="POST" action="/logout" class="dashboard__form">
                <input type="submit" value="Cerrar Sesión" class="dashboard__submit--logout">
            </form>
        </nav>
    </div> -->

    <div class="dashboard__header-encabezado">
        <p>¡Bienvenido! <?php echo $_SESSION['nombre'] ?? 'Administrador' ?></p>
        <picture>
            <source srcset="<?php echo $_ENV['HOST'] . '/build/img/Logo-mi-clima.webp'; ?>" type="image/webp">
            <source srcset="<?php echo $_ENV['HOST'] . '/build/img/Logo-mi-clima.png'; ?>" type="image/png">
            <img src="<?php echo $_ENV['HOST'] . '/build/img/Logo-mi-clima.png'; ?>" alt="Logo MI Clima">
        </picture>
    </div>
</header>