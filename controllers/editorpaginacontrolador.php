<?php
//$dias = facturacion::inner_join('SELECT COUNT(id) AS servicios, fecha_pago, SUM(total) AS totaldia FROM facturacion GROUP BY fecha_pago ORDER BY COUNT(id) DESC;');
namespace Controllers;

use MVC\Router;  //namespace\clase
 
class editorpaginacontrolador{

    public static function index(Router $router){
        session_start();
        isadmin();
        $alertas = [];

        $router->render('admin/paginas/index', ['titulo'=>'Reportes', 'user'=>$_SESSION, 'alertas'=>$alertas]);
    }

    ///////////////////////// Reportes ///////////////////////////////////
    public static function ventasgenerales(Router $router){
        session_start();
        isadmin();
        $alertas = [];

        $router->render('admin/reportes/ventasgenerales', ['titulo'=>'Reportes', 'user'=>$_SESSION, 'alertas'=>$alertas]);
    }
    public static function cierrescaja(Router $router){
        session_start();
        isadmin();
        $alertas = [];

        $router->render('admin/reportes/cierrescaja', ['titulo'=>'Reportes', 'user'=>$_SESSION, 'alertas'=>$alertas]);
    }
    public static function zdiario(Router $router){
        session_start();
        isadmin();
        $alertas = [];

        $router->render('admin/reportes/zdiario', ['titulo'=>'Reportes', 'user'=>$_SESSION, 'alertas'=>$alertas]);
    }
    public static function ventasxtransaccion(Router $router){
        session_start();
        isadmin();
        $alertas = [];

        $router->render('admin/reportes/ventasxtransaccion', ['titulo'=>'Reportes', 'user'=>$_SESSION, 'alertas'=>$alertas]);
    }
}