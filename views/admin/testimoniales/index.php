<div class="box testimoniales">
    <h4 class="text-gray-600 mb-8">Testimoniales</h4>
    <?php include __DIR__. "/../../templates/alertas.php"; ?>
    <button id="crearTestimonial" class="btn-md btn-blue mb-4">Crear</button>

    <div class="mt-4">
        <table id="tablaTestimoniales" class="tabla">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre Cliente</th>
                    <th>Titulo</th>
                    <th>Comentario</th>
                    <th>Email</th>
                    <th class="accionesth">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($testimoniales as $testimonial): ?>
                    <tr> 
                        <td class=""><?php echo $testimonial->id; ?></td> 
                        <td class=""><?php echo $testimonial->nombre; ?></td>
                        <td class=""><?php echo $testimonial->titulo; ?></td>
                        <td class=""><?php echo $testimonial->comentario; ?></td>
                        <td class=""><?php echo $testimonial->email; ?></td>       
                        <td class="accionestd">
                            <div class="acciones-btns" id="<?php echo $testimonial->id;?>"><button class="btn-md btn-turquoise editarTestimonial"><i class="fa-solid fa-pen-to-square"></i></button><button class="btn-md <?php echo $testimonial->estado==1?'btn-red':'btn-lima'; ?> eliminarTsetimonial"><i class="fa-solid fa-ban"></i></button></div>
                        </td>   
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <dialog class="midialog-sm p-5" id="miDialogoTestimonial">
        <h4 id="modalTestimonial" class="font-semibold text-gray-700 mb-4">Crear Testimonial</h4>
        <div id="divmsjalerta1"></div>
        <form id="formCrearUpdateTestimonial" class="formulario" action="/admin/testimoniales" method="POST">
              
            <div class="formulario__campo">
                <label class="formulario__label" for="nombre">Nombre</label>
                <div class="formulario__dato">
                    <input class="formulario__input" type="text" placeholder="Nombre del cliente" id="nombre" name="nombre" value="<?php echo $nuevotestimonio->nombre??'';?>" required>
                    <label data-num="50" class="count-charts" for="">50</label>
                </div>
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="titulo">Titulo</label>
                <div class="formulario__dato">
                    <input class="formulario__input" type="text" placeholder="titulo del testimonio" id="titulo" name="titulo" value="<?php echo $nuevotestimonio->titulo??'';?>" required>
                    <label data-num="30" class="count-charts" for="">30</label>
                </div>
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="comentario">Comentario</label>
                <div class="formulario__dato">
                    <input class="formulario__input" type="text" placeholder="Comentario del testimonio" id="comentario" name="comentario" value="<?php echo $nuevotestimonio->comentario??'';?>" required>
                    <label data-num="336" class="count-charts" for="">336</label>
                </div>
            </div>
            <div class="formulario__campo">
                <label class="formulario__label" for="email">Email</label>
                <div class="formulario__dato">
                    <input class="formulario__input" type="email" placeholder="Email del servicio" id="email" name="email" value="<?php echo $nuevotestimonio->email??'';?>">
                    <label data-num="54" class="count-charts" for="">54</label>
                </div>
            </div>
           
            <div class="text-right">
                <button class="btn-md btn-red" type="button" value="salir">Salir</button>
                <input id="btnEditarCreartestimonial" class="btn-md btn-blue" type="submit" value="Crear">
            </div>
        </form>
    </dialog><!--fin editar el testimonio-->
    
</div>