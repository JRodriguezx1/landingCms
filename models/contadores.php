<?php

namespace Model;

class contadores extends ActiveRecord{
    protected static $tabla = 'contadores';
    protected static $columnasDB = ['id', 'descripcion', 'numero', 'estado'];
    
    public function __construct($args = []){
        $this->id = $args['id']??null;
        $this->descripcion = $args['descripcion']??'';
        $this->numero = $args['numero']??1;
        $this->estado = $args['estado']??1;
    }

    public function validar(){
        if(!$this->descripcion)self::$alertas['error'][] = "descripcion del contador es obligatorio";
        if(strlen($this->descripcion)>42)self::$alertas['error'][] = 'Has excecido el limite de caracteres de la descripcion del contador';
        if(!$this->numero)self::$alertas['error'][] = "numero del contador no especificada";
        if(!isset($this->numero) || strlen($this->numero)>5){
            self::$alertas['error'][] = 'Has excecido el limite de caracteres del numero del contador';
        }elseif(!is_numeric($this->numero)){
           self::$alertas['error'][] = 'El numero de contador no es numerico'; 
        }
        return self::$alertas;
    }
}

?>