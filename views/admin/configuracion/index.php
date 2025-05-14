<div class="configuracion box">
    <div class="tabs" id="tabulacion">
        <div class="tabs-content">
            <label><input type="radio" name="radio" <?php echo $paginanegocio??'';?> ><span id="pagina1">Negocio</span></label>
            <label><input type="radio" name="radio"><span id="pagina5">Configuración</span></label>
        </div>
    </div>

    <?php include __DIR__. "/../../templates/alertas.php"; ?>
    <!-- negocio -->
    <div class="hidden max-w-screen-md mx-auto mt-6 negocio paginas pagina1"><?php include __DIR__. "/negocio.php";?></div>
    
    

    <!-- configuraciónes adicionales -->
    <div class="hidden mt-6 paginas pagina2 configAdd">
        
        
        
    </div> <!-- fin pagina5 -->


</div>