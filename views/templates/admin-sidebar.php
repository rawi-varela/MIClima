<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo pagina_actual('/dashboard') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Inicio
            </span>    
        </a>

        <a href="/admin/propiedades" class="dashboard__enlace <?php echo pagina_actual('/propiedades') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-building-columns dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Unidad de Negocio
            </span>    
        </a>

        <a href="/admin/areas" class="dashboard__enlace <?php echo pagina_actual('/areas') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-building dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Departamentos
            </span>    
        </a>

        <a href="/admin/puestos" class="dashboard__enlace <?php echo pagina_actual('/puestos') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-building-user dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Puestos
            </span>    
        </a>
        
        <?php if(is_admin()): ?>
            <a href="/admin/th" class="dashboard__enlace <?php echo pagina_actual('/th') ? 'dashboard__enlace--actual' : ''; ?> ">
            <i class="fa-solid fa-users dashboard__icono"></i>
            <span class="dashboard__menu-texto">
                Talento Humano
            </span>    
        </a>
        <?php endif; ?>
    </nav>
</aside>