<?php

namespace Controllers;

use Model\ActiveRecord;
use MVC\Router;  //namespace\clase
use Model\clientes;

 
class clientescontrolador{

    public static function index(Router $router){
        session_start();
        isadmin();
        $alertas = [];
        $clientes = clientes::all();
       
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            
        }
        $router->render('admin/clientes/index', ['titulo'=>'Clientes', 'clientes'=>$clientes, 'alertas'=>$alertas, 'user'=>$_SESSION]);
    }

    public static function crear(Router $router){
        /*$alertas = $usuario->validarEmail();    
        $usuarioexiste = $usuario->validar_registro();//retorna 1 si existe usuario(email), 0 si no existe
        $usuariotelexiste = $usuario->find('movil', $_POST['movil']);*/
        session_start();
        isadmin();
        $cliente = new clientes($_POST);
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $alertas = $cliente->validar_nuevo_cliente();
            $documentID = $cliente->validar_regDinamic('identificacion');
            //$alertas = $direccion->validarDireccion();
            if(empty($alertas) && !$documentID){ //si los campos cumplen los criterios y cliente no existe por documento    
                $resultado = $cliente->crear_guardar();  
                if($resultado[0]){
                    $alertas['exito'][] = 'Cliente Registrado correctamente'; 
                }else{
                    $alertas['error'][] = 'Hubo un error en el proceso, intentalo nuevamente';
                }
            }else{
                if($documentID)$cliente::setAlerta('error', 'El cliente ya esta registrado');
                $alertas = $cliente::getAlertas();
            }
        }
        $clientes = clientes::all();
        $router->render('admin/clientes/index', ['titulo'=>'clientes', 'clientes'=>$clientes, 'alertas'=>$alertas, 'user'=>$_SESSION]);
    }
     


    ///////////////////////////////////  Apis ////////////////////////////////////
    public static function allclientes(){  //api llamado desde citas.js
        $clientes = clientes::all();
        echo json_encode($clientes);
    }


    public static function apiActualizarcliente(){
        session_start();
        $alertas = []; 
        $cliente = clientes::find('id', $_POST['id']);
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $cliente->compara_objetobd_post($_POST);
            $alertas = $cliente->validar_nuevo_cliente();
            if(empty($alertas)){
                $r = $cliente->actualizar();
                if($r){
                    $alertas['exito'][] = "Datos del cliente actualizados";
                }else{
                    $alertas['error'][] = "Error al actualizar cliente";
                }
            }
        }
        $alertas['cliente'][] = $cliente;
        echo json_encode($alertas);  
    }

    public static function apiEditarNota(){
        session_start();
        $alertas = []; 
        $cliente = clientes::find('id', $_POST['id']);
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            $cliente->compara_objetobd_post($_POST);
            $alertas = $cliente->validar_nuevo_cliente();
            if(empty($alertas)){
                $r = $cliente->actualizar();
                if($r){
                    $alertas['exito'][] = "La nota del cliente actualizado";
                }else{
                    $alertas['error'][] = "Error al actualizar la nota del cliente";
                }
            }
        }
        $alertas['cliente'][] = $cliente;
        echo json_encode($alertas);  
    }

    public static function apiEliminarCliente(){
        session_start();
        $cliente = clientes::find('id', $_POST['id']);
        if($_SERVER['REQUEST_METHOD'] === 'POST' ){
            if(!empty($cliente)){
                $r = $cliente->eliminar_registro();
                if($r){
                    ActiveRecord::setAlerta('exito', 'Cliente eliminado correctamente');
                }else{
                    ActiveRecord::setAlerta('error', 'error en el proceso de eliminacion');
                }
            }else{
                ActiveRecord::setAlerta('error', 'Cliente no encontrado');
            }
        }
        $alertas = ActiveRecord::getAlertas();
        echo json_encode($alertas); 
    }
}