<div class="box secciones">
    <h4 class="text-gray-600 mb-8">Secciones</h4>
    <?php include __DIR__. "/../../templates/alertas.php"; ?>
    <!--<button id="crearSeccion" class="btn-md btn-blue mb-4">Crear</button>-->
    <div>
        <table id="tablaSecciones" class="tabla">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Seccion</th>
                    <th>Estado</th>
                    <th>Fecha Creacion</th>
                    <th class="accionesth">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($secciones as $seccion): ?>
                    <tr> 
                        <td class=""><?php echo $seccion->id; ?></td> 
                        <td class=""><?php echo $seccion->nombre; ?></td>
                        <td class=""><?php echo $seccion->estado==1?'Activo':'Inactivo'; ?></td>
                        <td class=""><?php echo $seccion->fechacreacion; ?></td>       
                        <td class="accionestd">
                            <div class="acciones-btns" id="<?php echo $seccion->id;?>"><button class="btn-md btn-turquoise editarSeccion"><i class="fa-solid fa-pen-to-square"></i></button><a href="/admin/seccion/block?id=<?php echo $seccion->id;?>" class="btn-md btn-blue editarContenidoSeccion"><i class="fa-solid fa-grip-vertical"></i></a><button class="btn-md <?php echo $seccion->estado==1?'btn-red':'btn-lima'; ?> bloquearSeccion"><i class="fa-solid fa-ban"></i></button></div>
                        </td>   
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <dialog class="midialog-sm p-5" id="miDialogoSeccion">
        <h4 id="modalSeccion" class="font-semibold text-gray-700 mb-4">Crear seccion</h4>
        <div id="divmsjalerta1"></div>
        
        <form id="formCrearUpdateseccion" class="formulario" action="/admin/secciones/crear_seccion" method="POST">
              
            <div class="formulario__campo">
                <label class="formulario__label" for="nombre">Nombre</label>
                <div class="formulario__dato">
                    <input class="formulario__input" type="text" placeholder="Nombre de la seccion" id="nombre" name="nombre" value="<?php echo $seccion->nombre??'';?>" required>
                    <label data-num="40" class="count-charts" for="">40</label>
                </div>
            </div>
           
            <div class="text-right">
                <button class="btn-md btn-red" type="button" value="salir">Salir</button>
                <input id="btnEditarCrearSeccion" class="btn-md btn-blue" type="submit" value="Crear">
            </div>
        </form>
    </dialog><!--fin editar la seccion-->
    
</div>