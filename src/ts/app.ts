const mobilemenu = document.querySelector('#mobile-menu');  //seleccion por id
const sidebar = document.querySelector('.sidebar') as HTMLElement|null;  //seleccion por calses
const btnmenux = document.querySelector('#mobile-menux');
const barra = document.querySelector('.barra-mobile') as HTMLElement|null;
const nametop:HTMLElement|null = document.querySelector('.nametop');
declare let Chart:any; //declare le indica a typescript que la variable chart viene de manera externa
declare const Swal: any;
declare var moment: any;

if(mobilemenu){
    mobilemenu.addEventListener('click', function(){
      if (sidebar && barra) {
        sidebar.classList.toggle('mostrar');
        barra.classList.toggle('ocultarmenu');
      }
    });
}
if(btnmenux){
    btnmenux.addEventListener('click', function(){
      if (sidebar && barra) {
        sidebar.classList.toggle('mostrar');
        barra.classList.toggle('ocultarmenu');
      }
    });
}
/////////////////////// animacion del sidebar toggle ///////////////////////////
document.querySelector('.sidebartoggle')!.addEventListener('click', (e)=>{
  if(sidebar)sidebar?.classList.toggle('minsidebar');
  if(nametop)nametop.classList.toggle('noneElement');
  $('.btnav').toggleClass('noneElement');
});

//------------------------------------------------------------------------------------------------------------------//
///////////////////// OBJETO DE CONFIGURACION DEL PLUGIN DATATABLES /////////////////////
const configdatatables = {
  "paging": true,
  "lengthChange": true,
  "searching": true,
  "ordering": true,
  "info": true,
  "autoWidth": true,
  "responsive": true,
  "deferRender": true,
  "retrieve": true,
  "processing": true,
  language: {
      search: 'Busqueda',
      emptyTable: 'No Hay datos disponibles',
      zeroRecords:    "No se encontraron registros coincidentes",
      lengthMenu: '_MENU_ Entradas por pagina',
      info: 'Mostrando pagina _PAGE_ de _PAGES_',
      infoEmpty: 'No hay entradas a mostrar',
      infoFiltered: ' (filtrado desde _MAX_ registros)',
      paginate: {"first": "<<", "last": ">>", "next": ">", "previous": "<"}
  }
}

///////////////////// FUNCION QUE IMPRIME MENSAJE TIPO ALERTA /////////////////////
function msjAlert(tipo:string, msj:string, divmsjalerta:HTMLElement):void{
  divmsjalerta.insertAdjacentHTML('beforeend', `<div class="alerta alerta__${tipo}">
      <p><i class="fa-solid fa-circle-exclamation"></i> ${msj}</p></div>`
  );
  borrarMsjAlert(divmsjalerta);
}
//////////////////// BORRAR MENSAJES TIPO ALERTA /////////////////////
/*(borrarMsjAlert =()=>{  //se aplica de manera global
  const msj = document.querySelector('#divmsjalerta');
  if(document.querySelector('.alerta'))setTimeout(()=>{ while(msj.firstChild)msj.removeChild(msj.firstChild);}, 5000);
})();*/
function borrarMsjAlert(divmsj:HTMLElement):void{  //se aplica de manera global
  //const msj = document.querySelector('#divmsjalerta')!;
  if(document.querySelector('.alerta'))setTimeout(()=>{ while(divmsj.firstChild)divmsj.removeChild(divmsj.firstChild);}, 5000);
}
//////////////////// FUNCION QUE IMPRIME UN MENSAJE FORMATO TOAST ////////////////////
//msjalertToast('error', '¡Error!', 'debe seleccionar una imagen')
function msjalertToast(icono:string, tipo:string, msj:string){
    Swal.fire({
    icon: icono,  // Puedes cambiar el ícono (success, error, warning, info, etc.)
    title: tipo,
    text: msj,
    toast: true,
    position: 'top-end',  
    showConfirmButton: false,  
    timer: 2700  
    });
}

/////////////////// FUNCION CONTADOR DE CARACTERES ////////////////////
(function countchars():void{
  const numinput = document.querySelectorAll('.count-charts') as NodeListOf<HTMLElement>;  
  numinput.forEach(element =>{ //element es cada label
      element.textContent = (parseInt(element.dataset.num!)-(element.previousElementSibling as HTMLInputElement).value.length).toString();
      element.previousElementSibling?.addEventListener('input', (e)=>{ //seleccionamos el input o el textarea en donde se escribe y se le da el evento de teclas
          element.textContent = parseInt(element.dataset.num!)-(e.target as HTMLInputElement).value.length+"";
            
          if(parseInt(element.dataset.num!)-(e.target as HTMLInputElement).value.length <= 0){
              let cadena = (e.target as HTMLInputElement).value.slice(0, parseInt(element.dataset.num!));
              (e.target as HTMLInputElement).value = cadena;
              element.textContent =`${0}`;
          }
      });
  });
})();

/////////////////// paginacion de negocio empleado, malla, config //////////////////
if(document.querySelector('#tabulacion')){ // view/admin/adminconfig/index.php
  const renderid = document.querySelector('#tabulacion input[type="radio"]:checked')!.nextElementSibling as HTMLElement; //se selecciona el input cheked y luego su span q contiene el id de la pagina a mostrar
  document.querySelector<HTMLElement>(`.${renderid.id}`)!.style.display = "block"; //mostramos la primera seccion
  const btns_navtabs = document.querySelectorAll('.tabs span');
  const paginas = document.querySelectorAll<HTMLElement>('.paginas'); //seleccionamos las secciones o paginas a mostrar
  btns_navtabs.forEach(Element => {
      Element.addEventListener('click', (e)=>{ //cada btn o enlace
          const target = e.target as HTMLElement;
          paginas.forEach(pagina =>pagina.style.display = "none"); ////quitamos la class mostrarseccion a todas las secciones
          document.querySelector<HTMLElement>(`.${target.id}`)!.style.display = "block"; //añadimos la class mostrarseccion a la la seccion o pagina correspondiente
      });
  });
}