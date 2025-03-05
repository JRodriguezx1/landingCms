(()=>{
  if(document.querySelector('.secciones')){
    const crearSeccion = document.querySelector('#crearSeccion');
    const miDialogoSeccion = document.querySelector('#miDialogoSeccion') as any;
    
    
    let indiceFila=0, control=0, tablaProductos:HTMLElement;
    

    type productsapi = {
      id:string,
      idcategoria: string,
      nombre: string,
      foto: string,
      marca: string,
      codigo: string,
      descripcion: string,
      peso: string,
      medidas: string,
      color: string,
      funcion: string,
      uso:string,
      fabricante: string,
      garantia: string,
      stock: string,
      categoria: string,
      precio_compra: string,
      precio_venta: string,
      fecha_ingreso: string,
      //idservicios:{idempleado:string, idservicio:string}[]
    };

    let products:productsapi[]=[], unproducto:productsapi;

    /*(async ()=>{
      try {
          const url = "/admin/api/allproducts"; //llamado a la API REST
          const respuesta = await fetch(url); 
          products = await respuesta.json(); 
          console.log(products);
      } catch (error) {
          console.log(error);
      }
    })();*/

    //////////////////  TABLA //////////////////////
    tablaProductos = ($('#tablaProductos') as any).DataTable(configdatatables);

    crearSeccion?.addEventListener('click', (e):void=>{
      control = 0;
      limpiarformdialog();
      document.querySelector('#modalSeccion')!.textContent = "Crear Seccion";
      (document.querySelector('#btnEditarCrearSeccion') as HTMLInputElement).value = "Crear";
      miDialogoSeccion.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    });

    document.querySelector('#tablaProductos')?.addEventListener("click", (e)=>{ //evento click sobre toda la tabla
      const target = e.target as HTMLElement;
      if((e.target as HTMLElement)?.classList.contains("editarProductos")||(e.target as HTMLElement).parentElement?.classList.contains("editarProductos"))editarProductos(e);
      if(target?.classList.contains("eliminarProductos")||target.parentElement?.classList.contains("eliminarProductos"))eliminarProductos(e);
    });

    function editarProductos(e:Event){
      let idproducto = (e.target as HTMLElement).parentElement?.id!;
      if((e.target as HTMLElement)?.tagName === 'I')idproducto = (e.target as HTMLElement).parentElement?.parentElement?.id!;
      control = 1;
      document.querySelector('#modalProducto')!.textContent = "Actualizar producto";
      (document.querySelector('#btnEditarCrearProducto') as HTMLInputElement)!.value = "Actualizar";
      unproducto = products.find(x=>x.id === idproducto)!;
      $('#categoria').val(unproducto?.idcategoria??'');
      (document.querySelector('#nombre')as HTMLInputElement).value = unproducto?.nombre!;
      (document.querySelector('#preciocompra')as HTMLInputElement).value = unproducto?.precio_compra??'';
      (document.querySelector('#precioventa')as HTMLInputElement).value = unproducto?.precio_venta??'';
      (document.querySelector('#sku')as HTMLInputElement).value = unproducto?.codigo??'';
      
      indiceFila = (tablaProductos as any).row((e.target as HTMLElement).closest('tr')).index();
      miDialogoSeccion.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    }

    ////////////////////  Actualizar/Editar producto  //////////////////////
    document.querySelector('#formCrearUpdateProducto')?.addEventListener('submit', e=>{
      if(control){
        e.preventDefault();
        
        var info = (tablaProductos as any).page.info();
        
       
        (async ()=>{ 
          const datos = new FormData();
          datos.append('id', unproducto!.id);
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
                products.forEach(a=>{if(a.id == unproducto.id)a = Object.assign(a, resultado.producto[0]);});
                ///////// cambiar la fila completa, su contenido //////////
                const datosActuales = (tablaProductos as any).row(indiceFila+=info.start).data();
                /*img*/datosActuales[1] = `<div class="text-center"><img class="inline" style="width: 50px;" src="/build/img/${resultado.producto[0].foto}" alt=""></div>`;
                /*NOMBRE*/datosActuales[2] ='<div class="w-80 whitespace-normal">'+$('#nombre').val()+'</div>';
                /*CATEGORIA*/datosActuales[3] = $('#categoria option:selected').text();
                /*MARCA*/datosActuales[4] = '';
                /*CODIGO*/datosActuales[5] = $('#sku').val();
                /*PRECIOVENTA*/datosActuales[6] = $('#precioventa').val();
                
                (tablaProductos as any).row(indiceFila).data(datosActuales).draw();
                (tablaProductos as any).page(info.page).draw('page'); //me mantiene la pagina actual
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

    function eliminarProductos(e:Event){
      let idproducto = (e.target as HTMLElement).parentElement!.id, info = (tablaProductos as any).page.info();
      if((e.target as HTMLElement).tagName === 'I')idproducto = (e.target as HTMLElement).parentElement!.parentElement!.id;
      indiceFila = (tablaProductos as any).row((e.target as HTMLElement).closest('tr')).index();
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
                  datos.append('id', idproducto);
                  try {
                      const url = "/admin/api/eliminarProducto";
                      const respuesta = await fetch(url, {method: 'POST', body: datos}); 
                      const resultado = await respuesta.json();  
                      if(resultado.exito !== undefined){
                        (tablaProductos as any).row(indiceFila+info.start).remove().draw(); 
                        (tablaProductos as any).page(info.page).draw('page');
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