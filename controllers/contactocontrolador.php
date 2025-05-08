<?php

namespace Controllers;

use Classes\Email;
use Model\usuarios; //namespace\clase hija
//use Model\negocio;

use MVC\Router;  //namespace\clase
 
class contactocontrolador{

  public static function formcontacto(Router $router){
    /*session_start();
    isadmin();*/
    $alertas = [];
    

    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
        // Enviar el email
        $emailcliente =  $_POST['email'];
        $nombre =  $_POST['nombre'];
        $telefono =  $_POST['telefono'];
        $mensaje =  $_POST['mensaje'];
        $email = new Email( $emailcliente, $nombre, $telefono, $mensaje);
        $envioEmail = $email->enviarConfirmacion();
        if($envioEmail == true){
            $alertas['exito'][] = "Solicitud enviada, pronto nos contactamos para ayudarte";
        }else{
            $alertas['error'][] = "Intenta enviar nuevamente el formulario";
        }
    }
    //$alertas = usuarios::getAlertas();
    $router->render('paginas/index', ['titulo'=>'nombre pagina', 'alertas'=>$alertas]);   //  'autenticacion/login' = carpeta/archivo
  }

  


}