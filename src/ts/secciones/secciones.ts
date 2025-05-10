(()=>{
  if(document.querySelector('.secciones')){
    const crearSeccion = document.querySelector('#crearSeccion');
    const miDialogoSeccion = document.querySelector('#miDialogoSeccion') as any;
    
    let indiceFila=0, control=0, tablaSecciones:HTMLElement;

    type sectionsapi = {
      id:string,
      nombre: string,
      fechacreacion: string,
      fechaupdate: string,
      //idservicios:{idempleado:string, idservicio:string}[]
    };

    let sections:sectionsapi[]=[], unasection:sectionsapi;

    (async ()=>{
      try {
          const url = "/admin/api/allsections"; //llamado a la API REST
          const respuesta = await fetch(url); 
          sections = await respuesta.json(); 
      } catch (error) {
          console.log(error);
      }
    })();

    //////////////////  TABLA //////////////////////
    tablaSecciones = ($('#tablaSecciones') as any).DataTable(configdatatables);

    crearSeccion?.addEventListener('click', (e):void=>{
      control = 0;
      limpiarformdialog();
      document.querySelector('#modalSeccion')!.textContent = "Crear Seccion";
      (document.querySelector('#btnEditarCrearSeccion') as HTMLInputElement).value = "Crear";
      miDialogoSeccion.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    });

    document.querySelector('#tablaSecciones')?.addEventListener("click", (e)=>{ //evento click sobre toda la tabla
      const target = e.target as HTMLElement;
      if((e.target as HTMLElement)?.classList.contains("editarSeccion")||(e.target as HTMLElement).parentElement?.classList.contains("editarSeccion"))editarSeccion(e);
      if(target?.classList.contains("bloquearSeccion")||target.parentElement?.classList.contains("bloquearSeccion"))bloquearSeccion(e);
    });

    function editarSeccion(e:Event){
      let idsection = (e.target as HTMLElement).parentElement?.id!;
      if((e.target as HTMLElement)?.tagName === 'I')idsection = (e.target as HTMLElement).parentElement?.parentElement?.id!;
      control = 1;
      document.querySelector('#modalSeccion')!.textContent = "Actualizar seccion";
      (document.querySelector('#btnEditarCrearSeccion') as HTMLInputElement)!.value = "Actualizar";
      unasection = sections.find(x=>x.id === idsection)!;
      (document.querySelector('#nombre')as HTMLInputElement).value = unasection?.nombre!;
      indiceFila = (tablaSecciones as any).row((e.target as HTMLElement).closest('tr')).index();
      miDialogoSeccion.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    }

    ////////////////////  Actualizar nombre de seccion  //////////////////////
    document.querySelector('#formCrearUpdateseccion')?.addEventListener('submit', e=>{
      if(control){
        e.preventDefault();
        var info = (tablaSecciones as any).page.info();
        (async ()=>{ 
          const datos = new FormData();
          datos.append('id', unasection!.id);
          datos.append('nombre', $('#nombre').val()as string);

          try {
              const url = "/admin/api/editarseccion";
              const respuesta = await fetch(url, {method: 'POST', body: datos}); 
              const resultado = await respuesta.json(); 
              if(resultado.exito !== undefined){
                msjalertToast('success', '¡Éxito!', resultado.exito[0]);
                /// actualizar el arregle de las secciones ///
                sections.forEach(a=>{if(a.id == unasection.id)a = Object.assign(a, resultado.seccion[0]);});

                const datosActuales = (tablaSecciones as any).row(indiceFila+=info.start).data();
                /*NOMBRE*/datosActuales[1] =$('#nombre').val();
                (tablaSecciones as any).row(indiceFila).data(datosActuales).draw();
                (tablaSecciones as any).page(info.page).draw('page'); //me mantiene la pagina actual
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

    function bloquearSeccion(e:Event){
      let idsection = (e.target as HTMLElement).parentElement!.id, info = (tablaSecciones as any).page.info();
      if((e.target as HTMLElement).tagName === 'I')idsection = (e.target as HTMLElement).parentElement!.parentElement!.id;
      indiceFila = (tablaSecciones as any).row((e.target as HTMLElement).closest('tr')).index();
      Swal.fire({
          customClass: {confirmButton: 'sweetbtnconfirm', cancelButton: 'sweetbtncancel'},
          icon: 'question',
          title: 'Desea bloquear la seccion?',
          text: "La seccion se bloqueara y no sera mostrada en la pagina web.",
          showCancelButton: true,
          confirmButtonText: 'Si',
          cancelButtonText: 'No',
      }).then((result:any) => {
          if (result.isConfirmed) {
              (async ()=>{ 
                  const datos = new FormData();
                  datos.append('id', idsection);
                  try {  
                      const url = "/admin/api/bloquearseccion?id="+idsection; //llamado a la API REST y se trae las direcciones segun cliente elegido
                      const respuesta = await fetch(url);
                      const resultado = await respuesta.json();
                      if(resultado.exito !== undefined){
                        const datosActuales = (tablaSecciones as any).row(indiceFila+=info.start).data();
                        datosActuales[2] = resultado.seccion[0].estado==='1'?'Activo':'Inactivo';
                        datosActuales[4] = `<div class="acciones-btns" id="${resultado.seccion[0].id}">
                                              <button class="btn-md btn-turquoise editarSeccion"><i class="fa-solid fa-pen-to-square"></i></button>
                                              <a href="/admin/secciones/seccion?id=${resultado.seccion[0].id}" class="btn-md btn-blue editarContenidoSeccion"><i class="fa-solid fa-grip-vertical"></i></a>
                                              <button class="btn-md ${resultado.seccion[0].estado==='1'?'btn-red':'btn-lima'} bloquearSeccion"><i class="fa-solid fa-ban"></i></button>
                                            </div>`;
                        (tablaSecciones as any).row(indiceFila).data(datosActuales).draw();
                        (tablaSecciones as any).page(info.page).draw('page'); //me mantiene la pagina actual
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
      (document.querySelector('#formCrearUpdateseccion') as HTMLFormElement)?.reset();
      //(document.querySelector('#formCrearUpdateseccion') as HTMLFormElement).action = "/admin/almacen/crear_producto";
    }
    function cerrarDialogoExterno(event:Event) {
      if (event.target === miDialogoSeccion || (event.target as HTMLInputElement).value === 'salir' || (event.target as HTMLInputElement).value === 'Actualizar') {
        miDialogoSeccion.close();
        document.removeEventListener("click", cerrarDialogoExterno);
      }
    }
  }

})();