(()=>{
  if(document.querySelector('.serviciosadicionales')){
    const crearServicioAdicional = document.querySelector('#crearServicioAdicional');
    const miDialogoServicio = document.querySelector('#miDialogoServicio') as any;
    
    let indiceFila=0, control=0, tablaServiciosAdicionales:HTMLElement;

    type serviciosAdicionalesapi = {
      id:string,
      titulo: string,
      contenido: string,
      textobtn: string,
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
      (document.querySelector('#titulo')as HTMLInputElement).value = unservicio?.titulo!;
      (document.querySelector('#contenido')as HTMLInputElement).value = unservicio?.contenido!;
      (document.querySelector('#textobtn')as HTMLInputElement).value = unservicio?.textobtn!;
      indiceFila = (tablaServiciosAdicionales as any).row((e.target as HTMLElement).closest('tr')).index();
      miDialogoServicio.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    }

    ////////////////////  Actualizar servicio adicioanal  //////////////////////
    document.querySelector('#formCrearUpdateServicio')?.addEventListener('submit', e=>{
      if(control){
        e.preventDefault();
        var info = (tablaServiciosAdicionales as any).page.info();
        (async ()=>{ 
          const datos = new FormData();
          datos.append('id', unservicio!.id);
          datos.append('titulo', $('#titulo').val()as string);
          datos.append('contenido', $('#contenido').val()as string);
          datos.append('textobtn', $('#textobtn').val()as string);
          try {
              const url = "/admin/api/editarServicio";  // llama controlador blockscontrolador.php
              const respuesta = await fetch(url, {method: 'POST', body: datos}); 
              const resultado = await respuesta.json(); 
              if(resultado.exito !== undefined){
                msjalertToast('success', '¡Éxito!', resultado.exito[0]);
                /// actualizar el arregle de las secciones ///
                servicios.forEach(a=>{if(a.id == unservicio.id)a = Object.assign(a, resultado.serviciosadicionales[0]);});
                const datosActuales = (tablaServiciosAdicionales as any).row(indiceFila+=info.start).data();
                /*TITULO*/datosActuales[1] =$('#titulo').val();
                /*CONTENIDO*/datosActuales[2] =$('#contenido').val();
                /*TEXTO BTN*/datosActuales[3] =$('#textobtn').val();
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
      let idservicio = (e.target as HTMLElement).parentElement!.id, info = (tablaServiciosAdicionales as any).page.info();
      if((e.target as HTMLElement).tagName === 'I')idservicio = (e.target as HTMLElement).parentElement!.parentElement!.id;
      indiceFila = (tablaServiciosAdicionales as any).row((e.target as HTMLElement).closest('tr')).index();

      Swal.fire({
          customClass: {confirmButton: 'sweetbtnconfirm', cancelButton: 'sweetbtncancel'},
          icon: 'question',
          title: 'Desea eliminar el servicio adicional',
          text: 'Se eliminara por completo el servicio adicional',
          showCancelButton: true,
          confirmButtonText: 'Si',
          cancelButtonText: 'No',
      }).then((result:any) => {
          if (result.isConfirmed) {
              (async ()=>{ 
                  const datos = new FormData();
                  datos.append('id', idservicio);
                  try {  
                      const url = "/admin/api/eliminarServicio?id="+idservicio; //llamado a la API REST, llama controlador blockscontrolador.php
                      const respuesta = await fetch(url);
                      const resultado = await respuesta.json();
                      if(resultado.exito !== undefined){
                        (tablaServiciosAdicionales as any).row(indiceFila+info.start).remove().draw(); 
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