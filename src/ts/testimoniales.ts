(()=>{
  if(document.querySelector('.testimoniales')){
    const crearTestimonial = document.querySelector('#crearTestimonial');
    const miDialogoTestimonial = document.querySelector('#miDialogoTestimonial') as any;
    
    let indiceFila=0, control=0, tablaTestimoniales:HTMLElement;

    type testimonialesapi = {
      id:string,
      nombre: string,
      titulo: string,
      comentario: string,
      imagen: string,
      email: string,
      fechacreacion: string,
      fechaupdate: string,
      //idtestimonial:{idempleado:string, idtestimonio:string}[]
    };

    let testimonial:testimonialesapi[]=[], untestimonio:testimonialesapi;

    (async ()=>{
      try {
          const url = "/admin/api/alltestimoniales"; //llamado a la API REST
          const respuesta = await fetch(url); 
          testimonial = await respuesta.json(); 
      } catch (error) {
          console.log(error);
      }
    })();

    //////////////////  TABLA //////////////////////
    tablaTestimoniales = ($('#tablaTestimoniales') as any).DataTable(configdatatables);

    crearTestimonial?.addEventListener('click', (e):void=>{
      control = 0;
      limpiarformdialog();
      document.querySelector('#modalTestimonial')!.textContent = "Crear Testimonial";
      (document.querySelector('#btnEditarCreartestimonial') as HTMLInputElement).value = "Crear";
      miDialogoTestimonial.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    });

    document.querySelector('#tablaTestimoniales')?.addEventListener("click", (e)=>{ //evento click sobre toda la tabla
      const target = e.target as HTMLElement;
      if((e.target as HTMLElement)?.classList.contains("editarTestimonial")||(e.target as HTMLElement).parentElement?.classList.contains("editarTestimonial"))editarTestimonial(e);
      if(target?.classList.contains("eliminarTsetimonial")||target.parentElement?.classList.contains("eliminarTsetimonial"))eliminarTsetimonial(e);
    });

    function editarTestimonial(e:Event){
      let idtestimonio = (e.target as HTMLElement).parentElement?.id!;
      if((e.target as HTMLElement)?.tagName === 'I')idtestimonio = (e.target as HTMLElement).parentElement?.parentElement?.id!;
      control = 1;
      document.querySelector('#modalTestimonial')!.textContent = "Actualizar Testimonio";
      (document.querySelector('#btnEditarCreartestimonial') as HTMLInputElement)!.value = "Actualizar";
      untestimonio = testimonial.find(x=>x.id === idtestimonio)!;
      (document.querySelector('#nombre')as HTMLInputElement).value = untestimonio?.nombre!;
      (document.querySelector('#titulo')as HTMLInputElement).value = untestimonio?.titulo!;
      (document.querySelector('#comentario')as HTMLInputElement).value = untestimonio?.comentario!;
      (document.querySelector('#email')as HTMLInputElement).value = untestimonio?.email!;
      indiceFila = (tablaTestimoniales as any).row((e.target as HTMLElement).closest('tr')).index();
      miDialogoTestimonial.showModal();
      document.addEventListener("click", cerrarDialogoExterno);
    }

    ////////////////////  Actualizar el testimonio  //////////////////////
    document.querySelector('#formCrearUpdateTestimonial')?.addEventListener('submit', e=>{
      if(control){
        e.preventDefault();
        var info = (tablaTestimoniales as any).page.info();
        (async ()=>{ 
          const datos = new FormData();
          datos.append('id', untestimonio!.id);
          datos.append('nombre', $('#nombre').val()as string);
          datos.append('titulo', $('#titulo').val()as string);
          datos.append('comentario', $('#comentario').val()as string);
          datos.append('email', $('#email').val()as string);
          try {
              const url = "/admin/api/editarTestimonial";
              const respuesta = await fetch(url, {method: 'POST', body: datos}); 
              const resultado = await respuesta.json(); 
              if(resultado.exito !== undefined){
                msjalertToast('success', '¡Éxito!', resultado.exito[0]);
                /// actualizar el arregle de las secciones ///
                testimonial.forEach(a=>{if(a.id == untestimonio.id)a = Object.assign(a, resultado.testimonial[0]);});
                const datosActuales = (tablaTestimoniales as any).row(indiceFila+=info.start).data();
                /*nombre*/datosActuales[1] =$('#nombre').val();
                /*titulo*/datosActuales[2] =$('#titulo').val();
                /*comentario*/datosActuales[3] =$('#comentario').val();
                /*email*/datosActuales[4] =$('#email').val();
                (tablaTestimoniales as any).row(indiceFila).data(datosActuales).draw();
                (tablaTestimoniales as any).page(info.page).draw('page'); //me mantiene la pagina actual
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

    function eliminarTsetimonial(e:Event){
      let idtestimonio = (e.target as HTMLElement).parentElement!.id, info = (tablaTestimoniales as any).page.info();
      if((e.target as HTMLElement).tagName === 'I')idtestimonio = (e.target as HTMLElement).parentElement!.parentElement!.id;
      indiceFila = (tablaTestimoniales as any).row((e.target as HTMLElement).closest('tr')).index();

      Swal.fire({
          customClass: {confirmButton: 'sweetbtnconfirm', cancelButton: 'sweetbtncancel'},
          icon: 'question',
          title: 'Desea eliminar el testimonial',
          text: 'Se eliminara por completo el testimonial',
          showCancelButton: true,
          confirmButtonText: 'Si',
          cancelButtonText: 'No',
      }).then((result:any) => {
          if (result.isConfirmed) {
              (async ()=>{ 
                  const datos = new FormData();
                  datos.append('id', idtestimonio);
                  try {  
                      const url = "/admin/api/eliminarTsetimonial?id="+idtestimonio; //llamado a la API REST y se trae las direcciones segun cliente elegido
                      const respuesta = await fetch(url);
                      const resultado = await respuesta.json();
                      if(resultado.exito !== undefined){
                        (tablaTestimoniales as any).row(indiceFila+info.start).remove().draw(); 
                        (tablaTestimoniales as any).page(info.page).draw('page'); //me mantiene la pagina actual
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
      (document.querySelector('#formCrearUpdateTestimonial') as HTMLFormElement)?.reset();
      //(document.querySelector('#formCrearUpdateTestimonial') as HTMLFormElement).action = "/admin/almacen/crear_producto";
    }
    function cerrarDialogoExterno(event:Event) {
      if (event.target === miDialogoTestimonial || (event.target as HTMLInputElement).value === 'salir' || (event.target as HTMLInputElement).value === 'Actualizar') {
        miDialogoTestimonial.close();
        document.removeEventListener("click", cerrarDialogoExterno);
      }
    }
  }

})();