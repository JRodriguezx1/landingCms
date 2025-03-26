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
          console.log(sections);
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
      if(target?.classList.contains("eliminarSeccion")||target.parentElement?.classList.contains("eliminarSeccion"))eliminarSeccion(e);
    });

    function editarSeccion(e:Event){
      let idsection = (e.target as HTMLElement).parentElement?.id!;
      if((e.target as HTMLElement)?.tagName === 'I')idsection = (e.target as HTMLElement).parentElement?.parentElement?.id!;
      control = 1;
      document.querySelector('#modalSeccion')!.textContent = "Actualizar seccion";
      (document.querySelector('#btnEditarCrearSeccion') as HTMLInputElement)!.value = "Actualizar";
      unasection = sections.find(x=>x.id === idsection)!;
      //$('#categoria').val(unasection?.idcategoria??'');
      (document.querySelector('#nombre')as HTMLInputElement).value = unasection?.nombre!;
      /*(document.querySelector('#preciocompra')as HTMLInputElement).value = unasection?.precio_compra??'';
      (document.querySelector('#precioventa')as HTMLInputElement).value = unasection?.precio_venta??'';
      (document.querySelector('#sku')as HTMLInputElement).value = unasection?.codigo??'';*/
      
      indiceFila = (tablaSecciones as any).row((e.target as HTMLElement).closest('tr')).index();
      miDialogoSeccion.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    }

    ////////////////////  Actualizar/Editar producto  //////////////////////
    document.querySelector('#formCrearUpdateProducto')?.addEventListener('submit', e=>{
      if(control){
        e.preventDefault();
        
        var info = (tablaSecciones as any).page.info();
        
       
        (async ()=>{ 
          const datos = new FormData();
          datos.append('id', unasection!.id);
          datos.append('idcategoria', $('#categoria').val()as string);
          datos.append('nombre', $('#nombre').val()as string);
          datos.append('precio_compra', $('#preciocompra').val()as string);
          datos.append('precio_venta', $('#precioventa').val()as string);
          datos.append('codigo', $('#sku').val()as string);
          try {
              const url = "/admin/api/actualizarproducto";
              const respuesta = await fetch(url, {method: 'POST', body: datos}); 
              const resultado = await respuesta.json(); 
              console.log(resultado); 
              if(resultado.exito !== undefined){
                msjalertToast('success', '¡Éxito!', resultado.exito[0]);
                /// actualizar el arregle del producto ///
                sections.forEach(a=>{if(a.id == unasection.id)a = Object.assign(a, resultado.producto[0]);});
                ///////// cambiar la fila completa, su contenido //////////
                const datosActuales = (tablaSecciones as any).row(indiceFila+=info.start).data();
                /*img*/datosActuales[1] = `<div class="text-center"><img class="inline" style="width: 50px;" src="/build/img/${resultado.producto[0].foto}" alt=""></div>`;
                /*NOMBRE*/datosActuales[2] ='<div class="w-80 whitespace-normal">'+$('#nombre').val()+'</div>';
                /*CATEGORIA*/datosActuales[3] = $('#categoria option:selected').text();
                /*MARCA*/datosActuales[4] = '';
                /*CODIGO*/datosActuales[5] = $('#sku').val();
                /*PRECIOVENTA*/datosActuales[6] = $('#precioventa').val();
                
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

    function eliminarSeccion(e:Event){
      let idsection = (e.target as HTMLElement).parentElement!.id, info = (tablaSecciones as any).page.info();
      if((e.target as HTMLElement).tagName === 'I')idsection = (e.target as HTMLElement).parentElement!.parentElement!.id;
      indiceFila = (tablaSecciones as any).row((e.target as HTMLElement).closest('tr')).index();
      Swal.fire({
          customClass: {confirmButton: 'sweetbtnconfirm', cancelButton: 'sweetbtncancel'},
          icon: 'question',
          title: 'Desea eliminar el prducto?',
          text: "El prducto sera eliminado definitivamente.",
          showCancelButton: true,
          confirmButtonText: 'Si',
          cancelButtonText: 'No',
      }).then((result:any) => {
          if (result.isConfirmed) {
              (async ()=>{ 
                  const datos = new FormData();
                  datos.append('id', idsection);
                  try {
                      const url = "/admin/api/eliminarProducto";
                      const respuesta = await fetch(url, {method: 'POST', body: datos}); 
                      const resultado = await respuesta.json();  
                      if(resultado.exito !== undefined){
                        (tablaSecciones as any).row(indiceFila+info.start).remove().draw(); 
                        (tablaSecciones as any).page(info.page).draw('page');
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
      (document.querySelector('#formCrearUpdateProducto') as HTMLFormElement)?.reset();
      //(document.querySelector('#formCrearUpdateProducto') as HTMLFormElement).action = "/admin/almacen/crear_producto";
    }
    function cerrarDialogoExterno(event:Event) {
      if (event.target === miDialogoSeccion || (event.target as HTMLInputElement).value === 'salir' || (event.target as HTMLInputElement).value === 'Actualizar') {
        miDialogoSeccion.close();
        document.removeEventListener("click", cerrarDialogoExterno);
      }
    }
  }

})();