<?php

namespace Controllers;

use Model\blocks;
use Model\contadores;
use Model\negocio;
use Model\serviciosadicionales;
use Model\testimoniales;
use Model\visitas;
//use DateTime;
use MVC\Router;



class paginacontrolador{

    public static function index(Router $router) { //metodo para mostrar la pagina inicial
        $alertas = [];
        date_default_timezone_set('America/Bogota');
        $fechaactual = date('Y-m-d');
        $blocks = blocks::all();
        $negocio = negocio::find('id', 1);
        $serviciosadicionales = serviciosadicionales::all();
        $testimoniales = testimoniales::all();
        $contadores = contadores::all();

        $visitas = visitas::find('id', 1);
        if($visitas){
            $visitas->totalvisitas = $visitas->totalvisitas+1;
            /// algoritmo para visitas de hoy
            if($visitas->fechavisitashoy == $fechaactual){
                $visitas->visitashoy = $visitas->visitashoy+1;
            }else{
                $visitas->visitashoy = 1;
                $visitas->fechavisitashoy = date('Y-m-d');
            }
            $r = $visitas->actualizar();
        }else{
            $visitas = new visitas([
                'totalvisitas'=>1,
                'visitashoy'=>1
            ]);
            $visitas->crear_guardar();
        }
        //$totalvisitas = $visitas->totalvisitas;
        //debuguear($totalvisitas);


        $router->render('paginas/index', ['titulo'=>'Tramites sin frontera', 'blocks'=>$blocks, 'serviciosadicionales'=>$serviciosadicionales, 'testimoniales'=>$testimoniales, 'contadores'=>$contadores, 'negocio'=>$negocio, 'alertas'=>$alertas/*, 'logo'=>negocio::uncampo('id', 1, 'logo')*/]);
    }

}

?>