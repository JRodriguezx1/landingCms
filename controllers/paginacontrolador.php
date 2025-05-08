<?php

namespace Controllers;

use Model\negocio;

//use DateTime;
use MVC\Router;



class paginacontrolador{

    public static function index(Router $router) { //metodo para mostrar la pagina inicial antes del login y registro
        $alertas = [];
        //verificar la fecha de cada promocion para poner su estado en cero '0', inhabilitado. y para las promos pendientes colocar en '1' para activar
        date_default_timezone_set('America/Bogota');
        $fechaactual = new \DateTime(date('Y-m-d'));
        
        $router->render('paginas/index', ['titulo'=>'Tramites sin frontera', 'alertas'=>$alertas/*, 'logo'=>negocio::uncampo('id', 1, 'logo')*/]);
    }

}

?>