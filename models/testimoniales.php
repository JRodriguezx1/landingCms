<?php

namespace Model;

class testimoniales extends ActiveRecord{
    protected static $tabla = 'testimoniales';
    protected static $columnasDB = ['id', 'nombre', 'titulo', 'comentario', 'imagen', 'email'];
    
    public function __construct($args = []){
        $this->id = $args['id']??null;
        $this->nombre = $args['nombre']??'';
        $this->titulo = $args['titulo']??'';
        $this->comentario = $args['comentario']??'';
        $this->imagen = $args['imagen']??'';
        $this->email = $args['email']??'';
        $this->fechacreacion = $args['fechacreacion'] ?? date('Y-m-d H:i:s');
        $this->fechaupdate = $args['fechaupdate'] ?? date('Y-m-d H:i:s');
    }

    public function validarTestimonial(){
        if(!$this->nombre)self::$alertas['error'][] = "nombre dle testimonial es obligatorio";
        if(strlen($this->nombre)>52)self::$alertas['error'][] = 'Has excecido el limite de caracteres del nombre del testimonial';
        if(!$this->titulo)self::$alertas['error'][] = "titulo del testimonial no especificada";
        if(strlen($this->titulo)>30)self::$alertas['error'][] = 'Has excecido el limite de caracteres del titulo del testimonial';
        if(!$this->comentario)self::$alertas['error'][] = "comentario del testimonial no especificada";
        if(strlen($this->comentario)>336)self::$alertas['error'][] = 'Has excecido el limite de caracteres del comentario testimonial';
        if($this->email)if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))self::$alertas['error'][] = 'Email no válido';
        return self::$alertas;
    }
}

?>