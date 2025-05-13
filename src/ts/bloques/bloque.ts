(()=>{
  if(document.querySelector('.block')){
    //const crearBlock = document.querySelector('#crearBlock');
    const miDialogoBloque = document.querySelector('#miDialogoBloque') as any;
    
    let indiceFila=0, control=0, tablaBloques:HTMLElement;

    type bloquesapi = {
      id:string,
      idsection: string,
      tipobloque: string,
      contenido: string,
      fechacreacion: string,
      fechaupdate: string,
      //idservicios:{idempleado:string, idservicio:string}[]
    };

    let bloques:bloquesapi[]=[], unbloque:bloquesapi;

    (async ()=>{
      try {
          const url = "/admin/api/allblocks"; //llamado a la API REST
          const respuesta = await fetch(url); 
          bloques = await respuesta.json(); 
      } catch (error) {
          console.log(error);
      }
    })();

    //////////////////  TABLA //////////////////////
    tablaBloques = ($('#tablaBloques') as any).DataTable(configdatatables);

    /*crearBlock?.addEventListener('click', (e):void=>{
      control = 0;
      limpiarformdialog();
      document.querySelector('#modalSeccion')!.textContent = "Crear Seccion";
      (document.querySelector('#btnEditarCrearSeccion') as HTMLInputElement).value = "Crear";
      miDialogoBloque.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    });*/

    document.querySelector('#tablaBloques')?.addEventListener("click", (e)=>{ //evento click sobre toda la tabla
      const target = e.target as HTMLElement;
      if((e.target as HTMLElement)?.classList.contains("editarBloque")||(e.target as HTMLElement).parentElement?.classList.contains("editarBloque"))editarBloque(e);
      if(target?.classList.contains("bloquearBloque")||target.parentElement?.classList.contains("bloquearBloque"))bloquearBloque(e);
    });

    function editarBloque(e:Event){
      let idbloque = (e.target as HTMLElement).parentElement?.id!;
      if((e.target as HTMLElement)?.tagName === 'I')idbloque = (e.target as HTMLElement).parentElement?.parentElement?.id!;
      control = 1;
      document.querySelector('#modalBloque')!.textContent = "Actualizar Contenido";
      (document.querySelector('#btnEditarCrearBloque') as HTMLInputElement)!.value = "Actualizar";
      unbloque = bloques.find(x=>x.id === idbloque)!;
      (document.querySelector('#contenido')as HTMLInputElement).value = unbloque?.contenido!;
      indiceFila = (tablaBloques as any).row((e.target as HTMLElement).closest('tr')).index();
      miDialogoBloque.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    }

    ////////////////////  Actualizar bloque  //////////////////////
    document.querySelector('#formCrearUpdatebloque')?.addEventListener('submit', e=>{
      if(control){
        e.preventDefault();
        var info = (tablaBloques as any).page.info();
        (async ()=>{ 
          const datos = new FormData();
          datos.append('id', unbloque!.id);
          datos.append('contenido', $('#contenido').val()as string);
          try {
              const url = "/admin/api/editarBloque"; // llama a blockscontrolador.php
              const respuesta = await fetch(url, {method: 'POST', body: datos}); 
              const resultado = await respuesta.json(); 
              if(resultado.exito !== undefined){
                msjalertToast('success', '¡Éxito!', resultado.exito[0]);
                /// actualizar el arregle de las secciones ///
                bloques.forEach(a=>{if(a.id == unbloque.id)a = Object.assign(a, resultado.bloque[0]);});

                const datosActuales = (tablaBloques as any).row(indiceFila+=info.start).data();
                /*CONTENIDO*/datosActuales[2] =$('#contenido').val();
                (tablaBloques as any).row(indiceFila).data(datosActuales).draw();
                (tablaBloques as any).page(info.page).draw('page'); //me mantiene la pagina actual
              }else{
                msjalertToast('error', '¡Error!', resultado.error[0]);
              }
              document.addEventListener("click", cerrarDialogoExterno);
          } catch (error) {
              console.log(error);
          }
        })();//cierre de async()
      } //fin if(control)
    });

    function bloquearBloque(e:Event){
      let idbloque = (e.target as HTMLElement).parentElement!.id, info = (tablaBloques as any).page.info(), titulo:string, texto:string;
      if((e.target as HTMLElement).tagName === 'I')idbloque = (e.target as HTMLElement).parentElement!.parentElement!.id;
      indiceFila = (tablaBloques as any).row((e.target as HTMLElement).closest('tr')).index();
      
      if((e.target as HTMLElement).closest('button')?.classList.contains('btn-red')){
        titulo = "Desea ocultar el contenido?";
        texto = "El contenido sera ocultado en la pagina web.";
      }else{
        titulo = "Desea mostrar el contenido?";
        texto = "El contenido sera visible en la pagina web.";
      }

      Swal.fire({
          customClass: {confirmButton: 'sweetbtnconfirm', cancelButton: 'sweetbtncancel'},
          icon: 'question',
          title: titulo,
          text: texto,
          showCancelButton: true,
          confirmButtonText: 'Si',
          cancelButtonText: 'No',
      }).then((result:any) => {
          if (result.isConfirmed) {
              (async ()=>{ 
                  const datos = new FormData();
                  datos.append('id', idbloque);
                  try {  
                      const url = "/admin/api/bloquearBloque?id="+idbloque; //llamado a la API REST y se trae las direcciones segun cliente elegido
                      const respuesta = await fetch(url);
                      const resultado = await respuesta.json();
                      if(resultado.exito !== undefined){
                        const datosActuales = (tablaBloques as any).row(indiceFila+=info.start).data();
                        datosActuales[2] = resultado.bloque[0].estado==='1'?'Activo':'Inactivo';
                        datosActuales[4] = `<div class="acciones-btns" id="${resultado.bloque[0].id}">
                                              <button class="btn-md btn-turquoise editarBloque"><i class="fa-solid fa-pen-to-square"></i></button>
                                              <button class="btn-md ${resultado.bloque[0].estado==='1'?'btn-red':'btn-lima'} bloquearBloque"><i class="fa-solid fa-ban"></i></button>
                                            </div>`;
                        (tablaBloques as any).row(indiceFila).data(datosActuales).draw();
                        (tablaBloques as any).page(info.page).draw('page'); //me mantiene la pagina actual
                        Swal.fire(resultado.exito[0], '', 'success')
                      }else{
                          Swal.fire(resultado.error[0], '', 'error')
                      }
                  } catch (error) {
                      console.log(error);
                  }
              })();//cierre de async()
          }
      });
    }
   

    function limpiarformdialog(){
      (document.querySelector('#formCrearUpdatebloque') as HTMLFormElement)?.reset();
      //(document.querySelector('#formCrearUpdatebloque') as HTMLFormElement).action = "/admin/almacen/crear_producto";
    }
    function cerrarDialogoExterno(event:Event) {
      if (event.target === miDialogoBloque || (event.target as HTMLInputElement).value === 'salir' || (event.target as HTMLInputElement).value === 'Actualizar') {
        miDialogoBloque.close();
        document.removeEventListener("click", cerrarDialogoExterno);
      }
    }
  }

})();