<?php

namespace Controllers;

use Model\negocio;
use MVC\Router;  //namespace\clase
 
class configcontrolador{

  public static function index(Router $router){
    session_start();
    isadmin();
    $alertas = [];
    $negocio = negocio::find('id', 1);
    $empleado = new \stdClass();
    $empleado->perfil = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            
    }
    //$alertas = usuarios::getAlertas();
    $router->render('admin/configuracion/index', ['titulo'=>'Configuracion', 'paginanegocio'=>'checked', 'negocio'=>$negocio, 'alertas'=>$alertas, 'user'=>$_SESSION/*'negocio'=>negocio::get(1)*/]);   //  'autenticacion/login' = carpeta/archivo
  }


  public static function actualizar(Router $router){ //metodo para el llenado y actualizacion de los datos del negocio
        session_start();
        $alertas = [];
        $negocio = negocio::find('id', 1);

        if($negocio){ //actualizar
            if($_SERVER['REQUEST_METHOD'] === 'POST' ){
                $negocio->compara_objetobd_post($_POST);
                
                $alertas = $negocio->validarnegocio();
                if(!$alertas){
                    if(isset($_FILES['logo']) && $_FILES['logo']['name']){
                        $url_temp = $_FILES["logo"]["tmp_name"];
                        $existe_archivo = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/".$negocio->logo);
                        if($existe_archivo)unlink($_SERVER['DOCUMENT_ROOT']."/build/img/".$negocio->logo);
                        $negocio->logo = uniqid().$_FILES['logo']['name'];
                        move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/".$negocio->logo);
                    }
                    $r = $negocio->actualizar();
                    if($r)$alertas['exito'][] = "Datos de negocio actualizado";
                }
            }
        }else{  //crear
            if($_SERVER['REQUEST_METHOD'] === 'POST' ){
                $negocio = new negocio($_POST);
                $negocio->logo = $_FILES['logo']['name']??''; //solo se utiliza para validar los datos del negocio
                $alertas = $negocio->validarnegocio();
                if(!$alertas){
                    if(isset($_FILES['logo']) && $_FILES['logo']['name']){ //valida si se seleccion img en el form
                        $nombreimg = explode(".", $_FILES['logo']['name']);  // = "barberyeison.jpg"
                        $negocio->logo = uniqid().$_FILES['logo']['name'];
                        $existe_archivo1 = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/$nombreimg[0].webp");
                        $existe_archivo2 = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/$nombreimg[0].png");
                        $existe_archivo3 = file_exists($_SERVER['DOCUMENT_ROOT']."/build/img/$nombreimg[0].jpg");
                        if($existe_archivo1)unlink($_SERVER['DOCUMENT_ROOT']."/build/img/$nombreimg[0].webp");
                        if($existe_archivo2)unlink($_SERVER['DOCUMENT_ROOT']."/build/img/$nombreimg[0].png");
                        if($existe_archivo3)unlink($_SERVER['DOCUMENT_ROOT']."/build/img/$nombreimg[0].jpg");
                        
                        $url_temp = $_FILES["logo"]["tmp_name"];
                        move_uploaded_file($url_temp, $_SERVER['DOCUMENT_ROOT']."/build/img/".$negocio->logo);
                    }  
                    
                    $r = $negocio->crear_guardar();
                    if($r)$alertas['exito'][] = "Datos de negocio actualizado";
                    //if($r)header('Location: /admin/dashboard/entrada');
                }
            }
        }
        
        $router->render('admin/configuracion/index', ['titulo'=>'Administracion', 'negocio'=>$negocio, 'paginanegocio'=>'checked', 'user'=>$_SESSION, 'alertas'=>$alertas]);
    }

}