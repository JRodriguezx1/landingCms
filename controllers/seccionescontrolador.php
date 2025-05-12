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



  ///////////////////////////////////  Apis ////////////////////////////////////
  public static function allsections(){  //api llamado desde ventas.js me trae todas las direcciones segun cliente elegido
    $secciones = sections::all();
    echo json_encode($secciones);
  }

  /////////// editar nombre de seccion /////////////
  public static function editarseccion(Router $router){
    session_start();
    isadmin();
    $alertas = [];
    $seccion = sections::find('id', $_POST['id']);
    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
      $seccion->compara_objetobd_post($_POST);
      $r = $seccion->actualizar();
      if($r){
        $alertas['exito'][] = "Seccion actualizada con exito";
        $alertas['seccion'][] = $seccion;
      }else{
        $alertas['error'][] = "Hubo un error intenta nuevamente";
      }
    }
    echo json_encode($alertas);
  }

  public static function bloquearseccion(){
    session_start();
    isadmin();
    $alertas = [];

    $id = $_GET['id'];
    if(!is_numeric($id)){
      $alertas['error'][]="error durante el bloque de la seccion";
      echo json_encode($alertas);
      return;
    }
    $seccion = sections::find('id', $id);
    if($seccion){
      $seccion->estado = $seccion->estado=='1'?'0':'1';
      $r = $seccion->actualizar();
      if($r){
        $alertas['exito'][] = "Seccion bloqueada con exito";
        $alertas['seccion'][]= $seccion;
      }else{
        $alertas['error'][] = "Error al bloquear la seccion";
      }
    }
    echo json_encode($alertas);
  }

}