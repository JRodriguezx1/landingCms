<?php

namespace Controllers;

use Classes\Email;
use Model\usuarios; //namespace\clase hija
//use Model\negocio;
use Model\sections;
use MVC\Router;  //namespace\clase
 
class seccionescontrolador{

  public static function index(Router $router){
    session_start();
    isadmin();
    $alertas = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            
    }
    //$alertas = usuarios::getAlertas();
    $secciones = sections::all();
    $router->render('admin/secciones/index', ['titulo'=>'Secciones', 'secciones'=>$secciones, 'alertas'=>$alertas, 'user'=>$_SESSION/*'negocio'=>negocio::get(1)*/]);   //  'autenticacion/login' = carpeta/archivo
  }


  public static function crear_seccion(Router $router){
    session_start();
    isadmin();
    $alertas = [];

    $seccion = new sections($_POST);
    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
      $r = $seccion->crear_guardar();
      if($r[0]){
        $alertas['exito'][] = "Seccion creada con exito";
      }else{
        $alertas['error'][] = "Hubo un error intenta nuevamente";
      }
    }
    //$alertas = usuarios::getAlertas();
    $secciones = sections::all();
    $router->render('admin/secciones/index', ['titulo'=>'Secciones', 'secciones'=>$secciones, 'alertas'=>$alertas, 'user'=>$_SESSION/*'negocio'=>negocio::get(1)*/]);   //  'autenticacion/login' = carpeta/archivo
  }


  public static function editar_seccion(Router $router){
    session_start();
    isadmin();
    $alertas = [];

    $seccion = new sections($_POST);
    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
      $r = $seccion->crear_guardar();
      if($r[0]){
        $alertas['exito'][] = "Seccion creada con exito";
      }else{
        $alertas['error'][] = "Hubo un error intenta nuevamente";
      }
    }
    //$alertas = usuarios::getAlertas();
    $secciones = sections::all();
    $router->render('admin/secciones/index', ['titulo'=>'Secciones', 'secciones'=>$secciones, 'alertas'=>$alertas, 'user'=>$_SESSION/*'negocio'=>negocio::get(1)*/]);   //  'autenticacion/login' = carpeta/archivo
  }


}