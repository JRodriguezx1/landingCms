<div class="box testimoniales">
    <h4 class="text-gray-600 mb-8">Testimoniales</h4>
    <?php include __DIR__. "/../../templates/alertas.php"; ?>
    <button id="crearTestimonial" class="btn-md btn-blue mb-4">Crear</button>

    <div class="mt-4">
        <table id="tablaTestimoniales" class="tabla">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
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
</div>