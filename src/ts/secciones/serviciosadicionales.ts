(()=>{
  if(document.querySelector('.serviciosadicionales')){
    const crearServicioAdicional = document.querySelector('#crearServicioAdicional');
    const miDialogoServicio = document.querySelector('#miDialogoServicio') as any;
    
    let indiceFila=0, control=0, tablaServiciosAdicionales:HTMLElement;

    type serviciosAdicionalesapi = {
      id:string,
      idsection: string,
      tipobloque: string,
      contenido: string,
      fechacreacion: string,
      fechaupdate: string,
      //idservicios:{idempleado:string, idservicio:string}[]
    };

    let servicios:serviciosAdicionalesapi[]=[], unservicio:serviciosAdicionalesapi;

    (async ()=>{
      try {
          const url = "/admin/api/allserviciosadicionales"; //llamado a la API REST
          const respuesta = await fetch(url); 
          servicios = await respuesta.json(); 
      } catch (error) {
          console.log(error);
      }
    })();

    //////////////////  TABLA //////////////////////
    tablaServiciosAdicionales = ($('#tablaServiciosAdicionales') as any).DataTable(configdatatables);

    crearServicioAdicional?.addEventListener('click', (e):void=>{
      control = 0;
      limpiarformdialog();
      document.querySelector('#modalServicio')!.textContent = "Crear Servicio";
      (document.querySelector('#btnEditarCrearServicio') as HTMLInputElement).value = "Crear";
      miDialogoServicio.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    });

    document.querySelector('#tablaServiciosAdicionales')?.addEventListener("click", (e)=>{ //evento click sobre toda la tabla
      const target = e.target as HTMLElement;
      if((e.target as HTMLElement)?.classList.contains("editarServicio")||(e.target as HTMLElement).parentElement?.classList.contains("editarServicio"))editarServicio(e);
      if(target?.classList.contains("eliminarServicio")||target.parentElement?.classList.contains("eliminarServicio"))eliminarServicio(e);
    });

    function editarServicio(e:Event){
      let idservicio = (e.target as HTMLElement).parentElement?.id!;
      if((e.target as HTMLElement)?.tagName === 'I')idservicio = (e.target as HTMLElement).parentElement?.parentElement?.id!;
      control = 1;
      document.querySelector('#modalServicio')!.textContent = "Actualizar Servicio";
      (document.querySelector('#btnEditarCrearServicio') as HTMLInputElement)!.value = "Actualizar";
      unservicio = servicios.find(x=>x.id === idservicio)!;
      (document.querySelector('#contenido')as HTMLInputElement).value = unservicio?.contenido!;
      indiceFila = (tablaServiciosAdicionales as any).row((e.target as HTMLElement).closest('tr')).index();
      miDialogoServicio.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    }

    ////////////////////  Actualizar contenido del servicio adicioanal  //////////////////////
    document.querySelector('#formCrearUpdateServicio')?.addEventListener('submit', e=>{
      if(control){
        e.preventDefault();
        var info = (tablaServiciosAdicionales as any).page.info();
        (async ()=>{ 
          const datos = new FormData();
          datos.append('id', unservicio!.id);
          datos.append('contenido', $('#contenido').val()as string);

          try {
              const url = "/admin/api/editarServicio";
              const respuesta = await fetch(url, {method: 'POST', body: datos}); 
              const resultado = await respuesta.json(); 
              if(resultado.exito !== undefined){
                msjalertToast('success', '¡Éxito!', resultado.exito[0]);
                /// actualizar el arregle de las secciones ///
                servicios.forEach(a=>{if(a.id == unservicio.id)a = Object.assign(a, resultado.bloque[0]);});

                const datosActuales = (tablaServiciosAdicionales as any).row(indiceFila+=info.start).data();
                /*CONTENIDO*/datosActuales[3] =$('#contenido').val();
                (tablaServiciosAdicionales as any).row(indiceFila).data(datosActuales).draw();
                (tablaServiciosAdicionales as any).page(info.page).draw('page'); //me mantiene la pagina actual
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

    function eliminarServicio(e:Event){
      let idservicio = (e.target as HTMLElement).parentElement!.id, info = (tablaServiciosAdicionales as any).page.info(), titulo:string, texto:string;
      if((e.target as HTMLElement).tagName === 'I')idservicio = (e.target as HTMLElement).parentElement!.parentElement!.id;
      indiceFila = (tablaServiciosAdicionales as any).row((e.target as HTMLElement).closest('tr')).index();
      
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
                  datos.append('id', idservicio);
                  try {  
                      const url = "/admin/api/eliminarServicio?id="+idservicio; //llamado a la API REST y se trae las direcciones segun cliente elegido
                      const respuesta = await fetch(url);
                      const resultado = await respuesta.json();
                      if(resultado.exito !== undefined){
                        const datosActuales = (tablaServiciosAdicionales as any).row(indiceFila+=info.start).data();
                        datosActuales[2] = resultado.seccion[0].estado==='1'?'Activo':'Inactivo';
                        datosActuales[4] = `<div class="acciones-btns" id="${resultado.seccion[0].id}">
                                              <button class="btn-md btn-turquoise editarServicio"><i class="fa-solid fa-pen-to-square"></i></button>
                                              <a href="/admin/secciones/seccion?id=${resultado.seccion[0].id}" class="btn-md btn-blue editarContenidoSeccion"><i class="fa-solid fa-grip-vertical"></i></a>
                                              <button class="btn-md ${resultado.seccion[0].estado==='1'?'btn-red':'btn-lima'} eliminarServicio"><i class="fa-solid fa-ban"></i></button>
                                            </div>`;
                        (tablaServiciosAdicionales as any).row(indiceFila).data(datosActuales).draw();
                        (tablaServiciosAdicionales as any).page(info.page).draw('page'); //me mantiene la pagina actual
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
      (document.querySelector('#formCrearUpdateServicio') as HTMLFormElement)?.reset();
      //(document.querySelector('#formCrearUpdateServicio') as HTMLFormElement).action = "/admin/almacen/crear_producto";
    }
    function cerrarDialogoExterno(event:Event) {
      if (event.target === miDialogoServicio || (event.target as HTMLInputElement).value === 'salir' || (event.target as HTMLInputElement).value === 'Actualizar') {
        miDialogoServicio.close();
        document.removeEventListener("click", cerrarDialogoExterno);
      }
    }
  }

})();