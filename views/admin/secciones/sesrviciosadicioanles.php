<div class="box serviciosadicionales">
    <h4 class="text-gray-600 mb-8">Servicios Adicionales</h4>

    <button id="crearServicioAdicional" class="btn-md btn-blue mb-4">Crear</button>

    <div class="mt-4">
        <table id="tablaServiciosAdicionales" class="tabla">
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
                <?php foreach($servicios as $servicio): ?>
                    <tr> 
                        <td class=""><?php echo $servicio->id; ?></td> 
                        <td class=""><?php echo $servicio->tiposervicio; ?></td>
                        <td class=""><?php echo $servicio->contenido; ?></td>
                        <td class=""><?php echo $servicio->fechaupdate; ?></td>       
                        <td class="accionestd">
                            <div class="acciones-btns" id="<?php echo $servicio->id;?>"><button class="btn-md btn-turquoise editarservicio"><i class="fa-solid fa-pen-to-square"></i></button><button class="btn-md <?php echo $servicio->estado==1?'btn-red':'btn-lima'; ?> bloquearservicio"><i class="fa-solid fa-ban"></i></button></div>
                        </td>   
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>