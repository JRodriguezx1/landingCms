<div class="box secciones">
    <h4 class="text-gray-600 mb-8">Secciones</h4>
    <button id="crearSeccion" class="btn-md btn-blue mb-4">Crear</button>
    <div>
        <table class="tabla">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Seccion</th>
                    <th>Fecha Creacion</th>
                    <th class="accionesth">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($secciones as $seccion): ?>
                    <tr> 
                        <td class=""><?php echo $seccion->id; ?></td> 
                        <td class=""><?php echo $seccion->seccion; ?></td>         
                        <td class=""><?php echo $seccion->fechacreacion; ?></td>       
                        <td class="accionestd"><div class="acciones-btns" id="<?php echo $seccion->id;?>"><button class="btn-md btn-turquoise editarSeccion"><i class="fa-solid fa-pen-to-square"></i></button><button class="btn-md btn-red eliminarSeccion"><i class="fa-solid fa-trash-can"></i></button></div></td>   
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <dialog class="midialog-sm p-5" id="miDialogoSeccion">
        <h4 id="modalSeccion" class="font-semibold text-gray-700 mb-4">Crear seccion</h4>
        <div id="divmsjalerta1"></div>
        <form id="formCrearUpdateseccion" class="formulario" action="/admin/seccion/crear_seccion" enctype="multipart/form-data" method="POST">
            
            
            <div class="formulario__campo">
                <label class="formulario__label" for="nombre">Nombre</label>
                <div class="formulario__dato">
                    <input class="formulario__input" type="text" placeholder="Nombre del producto" id="nombre" name="nombre" value="<?php echo $producto->nombre??'';?>" required>
                    <label data-num="46" class="count-charts" for="">46</label>
                </div>
            </div>
            <div class="">
                <div class="formulario__campo">
                    <label class="formulario__label" for="preciocompra">Precio Compra</label>
                    <div class="formulario__dato">
                        <input class="formulario__input" type="number" min="0" placeholder="Precio de venta" id="preciocompra" name="precio_compra" value="<?php echo $producto->precio_compra??'';?>">
                    </div>
                </div>
                <div class="formulario__campo">
                    <label class="formulario__label" for="precioventa">Precio venta</label>
                    <div class="formulario__dato">
                        <input class="formulario__input" type="number" min="0" placeholder="Precio de venta" id="precioventa" name="precio_venta" value="<?php echo $producto->precio_venta??'';?>" required>
                    </div>
                </div>
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="sku">SKU Producto</label>
                <div class="formulario__dato">
                    <input class="formulario__input" type="text" placeholder="Codigo del producto" id="sku" name="sku" value="<?php echo $producto->codigo??'';?>">
                    <label data-num="36" class="count-charts" for="">36</label>
                </div>
            </div>
           
            
            <div class="text-right">
                <button class="btn-md btn-red" type="button" value="salir">Salir</button>
                <input id="btnEditarCrearSeccion" class="btn-md btn-blue" type="submit" value="Crear">
            </div>
        </form>
    </dialog><!--fin crear/editar producto-->
    
</div>