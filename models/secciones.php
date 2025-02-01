<?php
namespace Model;

class secciones extends ActiveRecord {
    protected static $tabla = 'secciones';
    protected static $columnasDB = ['id', 'nombre', 'fechacreacion', 'fechaupdate'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->fechacreacion = $args['fechacreacion'] ?? '';
        $this->fechaupdate = $args['fechaupdate'] ?? '';
    }

    // Validación para secciones nuevos
    public function validar_nuevo_cliente():array {
        if(!$this->nombre)self::$alertas['error'][] = 'El Nombre de la seccion es Obligatorio';
        if(strlen($this->nombre)>40)self::$alertas['error'][] = 'Has excecido el limite de caracteres';
        return self::$alertas;
    }

    
}