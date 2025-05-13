<?php

namespace Controllers;

use MVC\Router;  //namespace\clase
use Model\usuarios;
use Model\testimoniales;

class testimonialescontrolador{

    public static function index(Router $router){
        session_start();
        isadmin();
        $alertas = [];
        $nuevotestimonio = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $testimoniales = new testimoniales($_POST);
            $alertas = $testimoniales->validarTestimonial();
            if(empty($alertas)){
                $r = $testimoniales->crear_guardar();
                if($r[0]){
                $alertas['exito'][] = "Testimonial creado con exito";
                }else{
                $alertas['error'][] = "Error al crear testimonial intenta nuevamente";
                }
            }
        }
        $testimoniales = testimoniales::all();
        $router->render('admin/testimoniales/index', ['titulo'=>'Testimoniales', 'testimoniales'=>$testimoniales, 'alertas'=>$alertas, 'nuevotestimonio'=>$nuevotestimonio, 'user'=>$_SESSION]);
    }
     


    ///////////////////////////////////  Apis ////////////////////////////////////
  public static function alltestimoniales(){  //api llamado desde ventas.js me trae todas las direcciones segun cliente elegido
    $blocks = testimoniales::all();
    echo json_encode($blocks);
  }

  public static function editarTestimonial(){ //editar testimonial. desde testimoniales.ts
    session_start();
    isadmin();
    $alertas = [];
    $testimonial = testimoniales::find('id', $_POST['id']);
    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
      $testimonial->compara_objetobd_post($_POST);
      $r = $testimonial->actualizar();
      if($r){
        $alertas['exito'][] = "Testimonial actualizado con exito";
        $alertas['testimonial'][] = $testimonial;
      }else{
        $alertas['error'][] = "Hubo un error intenta nuevamente";
      }
    }
    echo json_encode($alertas);
  }


  public static function eliminarTsetimonial(){
    session_start();
    isadmin();
    $alertas = [];

    $id = $_GET['id'];
    if(!is_numeric($id)){
      $alertas['error'][]="error en el ID del testimonial";
      echo json_encode($alertas);
      return;
    }
    $testimonial = testimoniales::find('id', $id);
    if($testimonial){
      $r = $testimonial->eliminar_registro();
      if($r){
        $alertas['exito'][] = "Testimonial eliminado con exito";
      }else{
        $alertas['error'][] = "error durante La eliminacion del testimonial";
      }
    }
    echo json_encode($alertas);
  }

}