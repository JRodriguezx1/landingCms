(():void=>{

  if(document.querySelector('.contadores')){
    const inputsContadores = document.querySelectorAll<HTMLInputElement>('.inputcontadores');
    
    ///////////  eventos a los inputs medios de pago de declarar valores /////////////
    inputsContadores.forEach(m=>{
      m.addEventListener('input', (e)=>{  
        const inputcontador = (e.target as HTMLInputElement);
        (async ()=>{
          const datos = new FormData();
          datos.append('id', inputcontador.dataset.idcontador+'');
          datos.append('numero', inputcontador.value);
          try {
              const url = "/admin/api/updateContador";  //api llamada en cajacontrolador.php
              const respuesta = await fetch(url, {method: 'POST', body: datos}); 
              const resultado = await respuesta.json();
              if(resultado.exito !== undefined){
                inputcontador.style.color = "#02db02";
                inputcontador.style.fontWeight = "600";
              }else{
                inputcontador.style.color = "#ff4848";
                msjalertToast('error', '¡Error!', resultado.error[0]);
              }
          } catch (error) {
              console.log(error);
          }
        })();
      });
    });

  }
})();