<?php

namespace Controllers;

use Model\blocks;
use Model\negocio;
use Model\serviciosadicionales;
use Model\testimoniales;
//use DateTime;
use MVC\Router;



class paginacontrolador{

    public static function index(Router $router) { //metodo para mostrar la pagina inicial
        $alertas = [];
        //verificar la fecha de cada promocion para poner su estado en cero '0', inhabilitado. y para las promos pendientes colocar en '1' para activar
        date_default_timezone_set('America/Bogota');
        $fechaactual = new \DateTime(date('Y-m-d'));
        $blocks = blocks::all();
        $negocio = negocio::find('id', 1);
        $serviciosadicionales = serviciosadicionales::all();
        $testimoniales = testimoniales::all();
        $router->render('paginas/index', ['titulo'=>'Tramites sin frontera', 'blocks'=>$blocks, 'serviciosadicionales'=>$serviciosadicionales, 'testimoniales'=>$testimoniales, 'negocio'=>$negocio, 'alertas'=>$alertas/*, 'logo'=>negocio::uncampo('id', 1, 'logo')*/]);
    }

}

?>