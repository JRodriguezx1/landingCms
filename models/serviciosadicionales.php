<?php

namespace Model;

class serviciosadicionales extends ActiveRecord{
    protected static $tabla = 'serviciosadicionales';
    protected static $columnasDB = ['id', 'titulo', 'contenido', 'textobtn', 'fechacreacion', 'fechaupdate'];
    
    public function __construct($args = []){
        $this->id = $args['id']??null;
        $this->titulo = $args['titulo']??'';
        $this->contenido = $args['contenido']??'';
        $this->textobtn = $args['textobtn']??'¡Solicita Tu Trámite Ahora!';
        $this->fechacreacion = $args['fechacreacion'] ?? date('Y-m-d H:i:s');
        $this->fechaupdate = $args['fechaupdate'] ?? date('Y-m-d H:i:s');
    }


    public function validarServicioAdicional(){
        if(!$this->titulo)self::$alertas['error'][] = "Titulo del servicio adicional es obligatorio";
        if(strlen($this->titulo)>51)self::$alertas['error'][] = 'Has excecido el limite de caracteres del titulo';
        if(!$this->contenido)self::$alertas['error'][] = "Descripcion del servicio adicional es obligatorio";
        if(strlen($this->contenido)>249)self::$alertas['error'][] = 'Has excecido el limite de caracteres de la descripcion del servicio adicional';
        if(!$this->textobtn)self::$alertas['error'][] = "Texto del boton es obligatorio";
        if(strlen($this->textobtn)>29)self::$alertas['error'][] = 'Has excecido el limite de caracteres para el texto del boton';
        return self::$alertas;
    }
}

?>