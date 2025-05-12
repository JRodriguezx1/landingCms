<div class="box serviciosadicionales">
    <h4 class="text-gray-600 mb-8">Servicios Adicionales</h4>
    <?php include __DIR__. "/../../templates/alertas.php"; ?>
    <button id="crearServicioAdicional" class="btn-md btn-blue mb-4">Crear</button>

    <div class="mt-4">
        <table id="tablaServiciosAdicionales" class="tabla">
            <thead>
                <tr>
                    <th>id</th>
                    <th>titulo</th>
                    <th>contenido</th>
                    <th>Texto Boton</th>
                    <th class="accionesth">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($servicios as $servicio): ?>
                    <tr> 
                        <td class=""><?php echo $servicio->id; ?></td> 
                        <td class=""><?php echo $servicio->titulo; ?></td>
                        <td class=""><?php echo $servicio->contenido; ?></td>
                        <td class=""><?php echo $servicio->textobtn; ?></td>       
                        <td class="accionestd">
                            <div class="acciones-btns" id="<?php echo $servicio->id;?>"><button class="btn-md btn-turquoise editarServicio"><i class="fa-solid fa-pen-to-square"></i></button><button class="btn-md <?php echo $servicio->estado==1?'btn-red':'btn-lima'; ?> eliminarServicio"><i class="fa-solid fa-ban"></i></button></div>
                        </td>   
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <dialog class="midialog-sm p-5" id="miDialogoServicio">
        <h4 id="modalServicio" class="font-semibold text-gray-700 mb-4">Crear Servicio</h4>
        <div id="divmsjalerta1"></div>
        <form id="formCrearUpdateServicio" class="formulario" action="/admin/seccion/block/ServiciosAdicionales" method="POST">
              
            <div class="formulario__campo">
                <label class="formulario__label" for="titulo">Titulo</label>
                <div class="formulario__dato">
                    <input class="formulario__input" type="text" placeholder="titulo del servicio" id="titulo" name="titulo" value="<?php echo $servicio->titulo??'';?>" required>
                    <label data-num="50" class="count-charts" for="">50</label>
                </div>
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="contenido">Contenido</label>
                <div class="formulario__dato">
                    <input class="formulario__input" type="text" placeholder="Contenido del servicio" id="contenido" name="contenido" value="<?php echo $servicio->contenido??'';?>" required>
                    <label data-num="244" class="count-charts" for="">244</label>
                </div>
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="textobtn">Texto boton</label>
                <div class="formulario__dato">
                    <input class="formulario__input" type="text" placeholder="Texto boton del servicio" id="textobtn" name="textobtn" value="<?php echo $servicio->textobtn??'';?>" required>
                    <label data-num="28" class="count-charts" for="">28</label>
                </div>
            </div>
           
            <div class="text-right">
                <button class="btn-md btn-red" type="button" value="salir">Salir</button>
                <input id="btnEditarCrearServicio" class="btn-md btn-blue" type="submit" value="Crear">
            </div>
        </form>
    </dialog><!--fin editar la servicio-->

</div>