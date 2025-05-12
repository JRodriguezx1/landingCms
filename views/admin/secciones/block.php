<div class="box block">
    <h4 class="text-gray-600 mb-8"><?php echo $nombreseccion; ?></h4>
    <?php include __DIR__. "/../../templates/alertas.php"; ?>
    <div class="flex flex-wrap gap-2 mt-4 mb-6 pb-4 border-b-2 border-blue-600">
        <a class="btn-command" href="/admin/secciones"><span class="material-symbols-outlined">reply</span>Volver</a>
        <?php if($nombreseccion==='Servicios Adicionales'):?>
            <a class="btn-command text-center" href="/admin/seccion/block/ServiciosAdicionales"><span class="material-symbols-outlined">checkList</span>Agregar Servicios</a>
        <?php endif; ?>
    </div>
    <div class="mt-4">
        <table id="tablaBloques" class="tabla">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Tipo</th>
                    <th>contenido</th>
                    <th>Fecha Actualizacion</th>
                    <th class="accionesth">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bloques as $bloque): ?>
                    <tr> 
                        <td class=""><?php echo $bloque->id; ?></td> 
                        <td class=""><?php echo $bloque->tipobloque; ?></td>
                        <td class=""><?php echo $bloque->contenido; ?></td>
                        <td class=""><?php echo $bloque->fechaupdate; ?></td>       
                        <td class="accionestd">
                            <div class="acciones-btns" id="<?php echo $bloque->id;?>"><button class="btn-md btn-turquoise editarBloque"><i class="fa-solid fa-pen-to-square"></i></button><button class="btn-md <?php echo $bloque->estado==1?'btn-red':'btn-lima'; ?> bloquearBloque"><i class="fa-solid fa-ban"></i></button></div>
                        </td>   
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <dialog class="midialog-sm p-5" id="miDialogoBloque">
        <h4 id="modalBloque" class="font-semibold text-gray-700 mb-4">Crear bloque</h4>
        <div id="divmsjalerta1"></div>
        <form id="formCrearUpdatebloque" class="formulario" action="/admin/seccion/block/editar" method="POST">
              
            <div class="formulario__campo">
                <label class="formulario__label" for="contenido">Contenido</label>
                <div class="formulario__dato">
                    <input class="formulario__input" type="text" placeholder="Contenido del elemento" id="contenido" name="contenido" value="<?php echo $bloque->contenido??'';?>" required>
                    <label data-num="244" class="count-charts" for="">244</label>
                </div>
            </div>
           
            <div class="text-right">
                <button class="btn-md btn-red" type="button" value="salir">Salir</button>
                <input id="btnEditarCrearBloque" class="btn-md btn-blue" type="submit" value="Crear">
            </div>
        </form>
    </dialog><!--fin editar la bloque-->

</div>