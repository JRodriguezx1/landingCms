<div class="negocio__contenedor">
    <h4 class="text-center text-gray-600">Informacion Del Negocio</h4>
    <form class="formulario" action="/admin/adminconfig/actualizar" enctype="multipart/form-data" method="POST">
        <fieldset class="formulario__fieldset">
            <div class="formulario__campo">
                <label class="formulario__label" for="nombrenegocio">Nombre</label>
                <div class="formulario__dato">
                    <input id="negocio" class="formulario__input" type="text" placeholder="Nombre del negocio" id="nombrenegocio" name="nombre" value="<?php echo $negocio->nombre??''; ?>" required>
                    <label data-num="42" class="count-charts" for="">42</label>
                </div>
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="ciudadnegocio">Ciudad</label>
                <div class="formulario__dato">
                    <input id="negocio" class="formulario__input" type="text" placeholder="ciudad del negocio" id="ciudadnegocio" name="ciudad" value="<?php echo $negocio->ciudad ?? '';?>" required>
                    <label data-num="40" class="count-charts" for="">40</label>
                </div>
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="direccionnegocio">Direccion</label>
                <div class="formulario__dato">
                    <input id="negocio" class="formulario__input" type="text" placeholder="Direccion del negocio" id="direccionnegocio" name="direccion" value="<?php echo $negocio->direccion ?? '';?>" required>
                    <label data-num="56" class="count-charts" for="">56</label>
                </div>
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="telefononegocio">Telefono</label>
                <input id="negocio" class="formulario__input" type="number" placeholder="telefono fijo de contacto" id="telefononegocio" name="telefono" value="<?php echo $negocio->telefono ?? '';?>">
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="movilnegocio">Movil</label>
                <input id="negocio" class="formulario__input" type="number" min="3000000000" max="3777777777" placeholder="Movil de contacto" id="movilnegocio" name="movil" value="<?php echo $negocio->movil ?? '';?>" required>
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="">Correo Electrónico</label>
                <div class="formulario__dato">
                    <input id="negocio" class="formulario__input" type="email" placeholder="Ingresa correo electrónico" id="email" name="email" value="<?php echo $negocio->email ?? '';?>" required>
                    <label data-num="50" class="count-charts" for="">50</label>
                </div>
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="nit">NIT</label>
                <div class="formulario__dato">
                    <input id="negocio" class="formulario__input" type="text" placeholder="Nit del negocio" id="nit" name="nit" value="<?php echo $negocio->nit ?? '';?>" required>
                    <label data-num="12" class="count-charts" for="">12</label>
                </div>
            </div>
        </fieldset>
        <fieldset class="formulario__fieldset">
            <legend class="formulario-legend">Redes Sociales</legend>
            <div class="formulario__campo">
                <div class="formulario__contenedor-icono">
                    <div class="formulario__icono"><i class="fa-brands fa-whatsapp"></i></div>
                    <input id="negocio" class="formulario__input--sociales" type="number"  min="3000000000" max="3777777777" name="ws" placeholder="whatsapp" value="<?php echo $negocio->ws ?? '';?>" required>
                </div>
            </div>
            <div class="formulario__campo">
                <div class="formulario__contenedor-icono">
                    <div class="formulario__icono"><i class="fa-brands fa-facebook"></i></div>
                    <input id="negocio" class="formulario__input--sociales" type="text" name="facebook" placeholder="Facebook" value="<?php echo $negocio->facebook ?? ''; ?>">
                </div>
            </div>
            <div class="formulario__campo">
                <div class="formulario__contenedor-icono">
                    <div class="formulario__icono"><i class="fa-brands fa-instagram"></i></div>
                    <input id="negocio" class="formulario__input--sociales" type="text" name="instagram" placeholder="Instagram" value="<?php echo $negocio->instagram ?? ''; ?>">
                </div>
            </div>
            <!--<div class="formulario__campo">
                <div class="formulario__contenedor-icono">
                    <div class="formulario__icono"><i class="fa-brands fa-tiktok"></i></div>
                    <input id="negocio" class="formulario__input--sociales" type="text" name="tiktok" placeholder="tiktok" value="<?php //echo $negocio->tiktok ?? ''; ?>">
                </div>
            </div>-->
            <div class="formulario__campo">
                <div class="formulario__contenedor-icono">
                    <div class="formulario__icono"><i class="fa-brands fa-youtube"></i></div>
                    <input id="negocio" class="formulario__input--sociales" type="text" name="youtube" placeholder="Youtube" value="<?php echo $negocio->youtube ?? ''; ?>">
                </div>
            </div>
            <!--<div class="formulario__campo">
                <div class="formulario__contenedor-icono">
                    <div class="formulario__icono"><i class="fa-brands fa-twitter"></i></div>
                    <input id="negocio" class="formulario__input--sociales" type="text" name="twitter" placeholder="twitter" value="<?php //echo $negocio->twitter ?? ''; ?>">
                </div>
            </div>-->
            <div class="formulario__campo">
                <label class="formulario__label" for="logo">Logo</label>
                <input class="formulario__input--file" type="file" id="logo" name="logo">
                <label><?php echo $negocio->logo??'';?></label>
            </div>
        </fieldset>
        <input class="btn-lg btn-blueintense self-end" type="submit" value="Actualizar">
    </form>
</div>