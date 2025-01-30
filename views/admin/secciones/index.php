<div class="box secciones">
    <h4 class="text-gray-600 mb-8">Secciones</h4>
    <button class="btn-md btn-blue mb-4">Crear</button>
    <div>
    <table class="tabla">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Seccion</th>
                        <th>Apellido</th>
                        <th class="accionesth">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($secciones as $seccion): ?>
                        
                        <tr> 
                            <td class=""><?php echo $seccion->id; ?></td> 
                            <td class=""><?php echo $seccion->nombre; ?></td>         
                            <td class=""><?php echo $seccion->apellido; ?></td>       
                            <td class="accionestd"> <div data-id="<?php echo $seccion->id;?>" class="acciones-iconos"> <i title="Eitar datos del clinete" id="editar" class="finalizado fa-solid fa-pen-clip"></i><a href="/admin/seccions/detalle?id=<?php echo $seccion->id;?>"><i class="programar fa-solid fa-tablet-screen-button"></i></a><i title="Habilitar/deshabilidar seccion" id="hab_desh" class="<?php echo $seccion->habilitar==1?'cancelado fa-solid fa-x':'habilitar fa-solid fa-check' ?>"></i></div></td>    
                        </tr>
                        
                    <?php endforeach; ?>
                </tbody>
            </table>

    </div>
    
</div>