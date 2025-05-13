<?php
//$dias = facturacion::inner_join('SELECT COUNT(id) AS servicios, fecha_pago, SUM(total) AS totaldia FROM facturacion GROUP BY fecha_pago ORDER BY COUNT(id) DESC;');
namespace Controllers;

use Model\blocks;
use Model\sections;
use Model\serviciosadicionales;
use MVC\Router;  //namespace\clase
 
class blockscontrolador{
    
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
    $nuevoservicio = [];
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
    $router->render('admin/secciones/sesrviciosadicioanles', ['titulo'=>'Servicios Adicionales', 'servicios'=>$servicios, 'nuevoservicio'=>$nuevoservicio, 'alertas'=>$alertas, 'user'=>$_SESSION/*'negocio'=>negocio::get(1)*/]);   //  'autenticacion/login' = carpeta/archivo
  }


  ///////////////////////////////////  Apis ////////////////////////////////////
  public static function allblocks(){  //api llamado desde bloque.ts me trae todos los bloques
    $blocks = blocks::all();
    echo json_encode($blocks);
  }

  public static function editarBloque(){ //editar servicio adicioanal. desde serviciosadicioanles.ts
    session_start();
    isadmin();
    $alertas = [];
    $block = blocks::find('id', $_POST['id']);
    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
      $block->compara_objetobd_post($_POST);
      $r = $block->actualizar();
      if($r){
        $alertas['exito'][] = "Bloque actualizado con exito";
        $alertas['bloque'][] = $block;
      }else{
        $alertas['error'][] = "Hubo un error intenta nuevamente";
      }
    }
    echo json_encode($alertas);
  }

  

  public static function allserviciosadicionales(){  //api llamado desde serviciosadicioanles.ts me trae todas los servicios adicioanles
    $allserviciosadicionales = serviciosadicionales::all();
    echo json_encode($allserviciosadicionales);
  }

  public static function editarServicio(){ //editar servicio adicioanal. desde serviciosadicioanles.ts
    session_start();
    isadmin();
    $alertas = [];
    $serviciosadicionales = serviciosadicionales::find('id', $_POST['id']);
    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
      $serviciosadicionales->compara_objetobd_post($_POST);
      $r = $serviciosadicionales->actualizar();
      if($r){
        $alertas['exito'][] = "Servicio adicional actualizado con exito";
        $alertas['serviciosadicionales'][] = $serviciosadicionales;
      }else{
        $alertas['error'][] = "Hubo un error intenta nuevamente";
      }
    }
    echo json_encode($alertas);
  }


   public static function eliminarServicio(){
    session_start();
    isadmin();
    $alertas = [];

    $id = $_GET['id'];
    if(!is_numeric($id)){
      $alertas['error'][]="error en el ID del servicio adicional";
      echo json_encode($alertas);
      return;
    }
    $servicioadicional = serviciosadicionales::find('id', $id);
    if($servicioadicional){
      $r = $servicioadicional->eliminar_registro();
      if($r){
        $alertas['exito'][] = "Servicio adicional eliminado con exito";
      }else{
        $alertas['error'][] = "error durante La eliminacion del servicio adicional";
      }
    }
    echo json_encode($alertas);
  }
   
}