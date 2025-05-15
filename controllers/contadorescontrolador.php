<?php
//$dias = facturacion::inner_join('SELECT COUNT(id) AS servicios, fecha_pago, SUM(total) AS totaldia FROM facturacion GROUP BY fecha_pago ORDER BY COUNT(id) DESC;');
namespace Controllers;

use Model\contadores;
use MVC\Router;  //namespace\clase
 
class contadorescontrolador{
    public static function contadores(Router $router){
        session_start();
        isadmin();
        $alertas = [];
        $contadores = contadores::all();
        $router->render('admin/secciones/contadores', ['titulo'=>'Contadores', 'contadores'=>$contadores, 'alertas'=>$alertas, 'user'=>$_SESSION/*'negocio'=>negocio::get(1)*/]);   //  'autenticacion/login' = carpeta/archivo
    }


    ///////////////////////////-  API  -///////////////////////////////

    public static function updateContador(){
        $alertas = [];
        $contador = contadores::find('id', $_POST['id']);
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $contador->numero = $_POST['numero'];
            $alertas = $contador->validar();
            if(empty($alertas)){
                $r = $contador->actualizar();
                if($r)$alertas['exito'][] = '1'; 
            }
        }
        echo json_encode($alertas);
    }

}