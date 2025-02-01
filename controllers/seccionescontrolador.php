<?php

namespace Controllers;

use Classes\Email;
use Model\usuarios; //namespace\clase hija
//use Model\negocio;
use MVC\Router;  //namespace\clase
 
class seccionescontrolador{

  public static function index(Router $router){
    session_start();
    isadmin();
    $alertas = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            
    }
    //$alertas = usuarios::getAlertas();
    $secciones = [];
    $router->render('admin/secciones/index', ['titulo'=>'Secciones', 'secciones'=>$secciones, 'alertas'=>$alertas, 'user'=>$_SESSION/*'negocio'=>negocio::get(1)*/]);   //  'autenticacion/login' = carpeta/archivo
  }

  public static function crear_seccion(Router $router){
    session_start();
    isadmin();
    $alertas = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            
    }
    //$alertas = usuarios::getAlertas();
    $secciones = [];
    $router->render('admin/secciones/index', ['titulo'=>'Secciones', 'secciones'=>$secciones, 'alertas'=>$alertas, 'user'=>$_SESSION/*'negocio'=>negocio::get(1)*/]);   //  'autenticacion/login' = carpeta/archivo
  }


}