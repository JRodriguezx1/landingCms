<?php
//$dias = facturacion::inner_join('SELECT COUNT(id) AS servicios, fecha_pago, SUM(total) AS totaldia FROM facturacion GROUP BY fecha_pago ORDER BY COUNT(id) DESC;');
namespace Controllers;

use Model\blocks;
use Model\sections;
use Model\serviciosadicionales;
use MVC\Router;  //namespace\clase
 
class blockscontrolador{

    public static function index(Router $router){
        session_start();
        isadmin();
        $alertas = [];

        $router->render('admin/paginas/index', ['titulo'=>'Editarpagina', 'user'=>$_SESSION, 'alertas'=>$alertas]);
    }

    
    public static function getblock(Router $router){
    session_start();
    isadmin();
    $alertas = [];

    $id = $_GET['id']; //id de la seccion
    if(!is_numeric($id))return;

    $nombreseccion = sections::uncampo('id', $id, 'nombre');
    $bloques = blocks::idregistros('idsection', $id);
    $router->render('admin/secciones/block', ['titulo'=>'bloques', 'nombreseccion'=>$nombreseccion, 'bloques'=>$bloques, 'alertas'=>$alertas, 'user'=>$_SESSION/*'negocio'=>negocio::get(1)*/]);   //  'autenticacion/login' = carpeta/archivo
  }


  public static function ServiciosAdicionales(Router $router){
    session_start();
    isadmin();
    $alertas = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
       $servicios = new serviciosadicionales($_POST);
       $alertas = $servicios->validarServicioAdicional();
       if(empty($alertas)){
        $r = $servicios->crear_guardar();
        if($r[0]){
          $alertas['exito'][] = "Servicio adicional creado con exito";
        }else{
          $alertas['error'][] = "Error al crear servicio adicional intenta nuevamente";
        }
       }
    }
    $servicios = serviciosadicionales::all();
    $router->render('admin/secciones/sesrviciosadicioanles', ['titulo'=>'Servicios Adicionales', 'servicios'=>$servicios, 'alertas'=>$alertas, 'user'=>$_SESSION/*'negocio'=>negocio::get(1)*/]);   //  'autenticacion/login' = carpeta/archivo
  }


  ///////////////////////////////////  Apis ////////////////////////////////////
  public static function allblocks(){  //api llamado desde ventas.js me trae todas las direcciones segun cliente elegido
    $blocks = blocks::all();
    echo json_encode($blocks);
  }
   
}