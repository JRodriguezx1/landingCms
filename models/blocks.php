<?php
namespace Model;

class blocks extends ActiveRecord {
    protected static $tabla = 'blocks';
    protected static $columnasDB = ['id', 'idsection', 'tipobloque', 'contenido', 'fechacreacion', 'fechaupdate'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->idsection = $args['idsection'] ?? '';
        $this->tipobloque = $args['tipobloque'] ?? '';
        $this->contenido = $args['contenido'] ?? '';
        $this->fechacreacion = $args['fechacreacion'] ?? date('Y-m-d H:i:s');
        $this->fechaupdate = $args['fechaupdate'] ?? date('Y-m-d H:i:s');
    }

    // Validación para secciones nuevos
    public function validar_nuevo_bloque():array {
        if(!$this->idsection)self::$alertas['error'][] = 'La seccion es Obligatorio';
        //if(strlen($this->nombre)>40)self::$alertas['error'][] = 'Has excecido el limite de caracteres';
        return self::$alertas;
    }

    
}