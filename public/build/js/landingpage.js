document.addEventListener('DOMContentLoaded', function(){ iniciarapp(); });

let habilitar = true;
let varhrf = "";

function iniciarapp(){
    mostrar_btnflotante_ws();
    indicadoresContador();
}

function indicadoresContador(){ //funcion que al scrollear me resalta los botones del sidebar o menu lateral
    const observer = new IntersectionObserver(entries =>{
            entries.forEach(entrie =>{
                //interseccion con la caja de los contadores
                if(entrie.target.classList.contains('indicadorNum')){ 
                    if(entrie.isIntersecting )contador_animado_num();
                    
                }
            });
        }, { root: null, rootMargin: '0px 0px -0px 0px', threshold: 1.0 }
    );
    observer.observe(document.querySelector('#contador_num'));  //caja de contadores a observar
}


function contador_animado_num(){  
    let nums = document.querySelectorAll('.count_num');  //selecciona el span que muestra los numeros
    const intervalo = 12000;
    nums.forEach( num =>{
        let num_inicial = 0, x=3;
        let num_end = parseInt(num.getAttribute('data-valor'));
        let duracion = Math.floor(intervalo/num_end);  // rendondea hacia a bajo 2.7 rendondea a 2
        if(num_end>1000)x= Math.floor(num_end/700);
        if(num_end>10000)x= Math.floor(num_end/1000);
        let tiempo = setInterval(() => {
            num_inicial+=x;
            num.textContent = num_inicial+"+"; 
            if(num_inicial >= num_end){
                num.textContent = (num_end)+"+";
                clearInterval(tiempo);
            }
        }, duracion);
   });
}

function mostrar_btnflotante_ws(){
    window.addEventListener('scroll', ()=>{
       const scrollpixely = window.scrollY;
       const btn_flotante_ws = document.querySelector('.btn-ws');
       if(scrollpixely>200){ //200px hacia abajo muestra el btn ws
          btn_flotante_ws.style.visibility = "visible";
       }
    }); 
  }
  