<?php

namespace Controllers;

use Classes\Email;
use MVC\Router;  //namespace\clase
use Model\usuarios;
use Model\clientes;
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
}