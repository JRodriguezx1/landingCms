<!--<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__enlace <?php echo validar_string_url('/dashboard')?'dashboard__enlace--actual':''; ?>">
            <i class="fa-solid fa-house"></i>
            <span class="dashboard__menu-texto">inicio</span>
        </a>

        <a href="/admin/servicios" class="dashboard__enlace <?php echo validar_string_url('/servicios')?'dashboard__enlace--actual':''; ?>" >
            <i class="fa-solid fa-list"></i>
            <span class="dashboard__menu-texto">servicios</span>
        </a>

        <a href="/admin/facturacion" class="dashboard__enlace <?php echo validar_string_url('/facturacion')?'dashboard__enlace--actual':''; ?>" >
            <i class="fa-solid fa-credit-card"></i>
            <span class="dashboard__menu-texto">facturacion</span>
        </a>

        <a href="/admin/reportes" class="dashboard__enlace <?php echo validar_string_url('/reportes')?'dashboard__enlace--actual':''; ?>" >
            <i class="fa-solid fa-coins"></i>
            <span class="dashboard__menu-texto">reportes</span>
        </a>

        <a href="/admin/citas" class="dashboard__enlace <?php echo validar_string_url('/citas')?'dashboard__enlace--actual':''; ?>" >
            <i class="fa-solid fa-calendar"></i>
            <span class="dashboard__menu-texto">citas</span>
        </a>

        <a href="/admin/clientes" class="dashboard__enlace <?php echo validar_string_url('/clientes')?'dashboard__enlace--actual':''; ?>" >
            <i class="fa-solid fa-users"></i>
            <span class="dashboard__menu-texto">clientes</span>
        </a>

        <a href="/admin/fidelizacion" class="dashboard__enlace <?php echo validar_string_url('/fidelizacion')?'dashboard__enlace--actual':''; ?>" >
            <i class="fa-solid fa-gift"></i>
            <span class="dashboard__menu-texto">descuentos</span>
        </a>
        <?php //if($user['admin']>2): ?>
        <a href="/admin/adminconfig" class="dashboard__enlace <?php echo validar_string_url('/adminconfig')?'dashboard__enlace--actual':''; ?>" >
            <i class="fa-solid fa-gears"></i>
            <span class="dashboard__menu-texto">administrador</span>
        </a>
        <?php //endif; ?>
    </nav>
</aside>-->

<aside class="sidebar">
    <div class="uptask">
        <h1 class="font-bold nametop">CMS</h1>
        <div class="menux">
            <!--<img id="mobile-menux" src="/build/img/cerrar.svg" alt="cerrar menu">-->
            <span id="mobile-menux" class="material-symbols-outlined">menu</span>
        </div>
    </div>
    
    <nav class="sidebar-nav"> <!-- el tamaño de las letras de los links <a> estan definidos en 1.6rem en gloables.scss -->
        <a class="<?php echo ($titulo === 'Inicio')?'activo':''; ?>" href="/admin/dashboard"><span class="material-symbols-outlined">home</span> <label class="btnav"> Inicio</label> </a>
        <a class="<?php echo ($titulo === 'Secciones')?'activo':''; ?>" href="/admin/secciones"><span class="material-symbols-outlined"> article</span> <label class="btnav"> Secciones</label></a>
        <a class="<?php echo ($titulo === 'Editarpagina')?'activo':''; ?>" href="/admin/editarpagina"><span class="material-symbols-outlined">view_compact_alt</span> <label class="btnav"> Paginas</label></a>
        <a class="<?php echo ($titulo === 'Clientes')?'activo':''; ?>" href="/admin/clientes"><span class="material-symbols-outlined">support_agent</span> <label class="btnav"> Clientes</label></a>
        <a class="<?php echo ($titulo === 'Perfil')?'activo':''; ?>" href="/admin/perfil"><span class="material-symbols-outlined">manage_accounts</span> <label class="btnav"> Perfil</label></a>
        <a class="<?php echo ($titulo === 'Configuracion')?'activo':''; ?>" href="/admin/configuracion"><span class="material-symbols-outlined">settings</span> <label class="btnav"> Configuracion</label></a>
    </nav>
    <div class="cerrar-sesion-mobile">
        <p>Bienvenido: <span> <?php echo $_SESSION['nombre']; ?></span></p>
        <a class="cerrar-sesion" href="/logout">Cerrar Sesion</a>
    </div>
</aside>