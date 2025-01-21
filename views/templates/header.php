<div class="barra-mobile">
    <h1>CMS</h1>
    <div class="menu">
        <!--<img id="mobile-menu" src="/build/img/menu.svg" alt="imagen menu">-->
        <span id="mobile-menu" class="material-symbols-outlined">menu</span>
    </div>
</div>

<div class="barra">
    <div class="toggleanduser"><span class="sidebartoggle material-symbols-outlined">menu</span><p>hola: <span> <?php echo $_SESSION['nombre']; ?></span></p></div>
    <a class="cerrar-sesion" href="/logout">Cerrar Sesion</a>
</div>