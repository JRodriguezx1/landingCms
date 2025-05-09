<?php
namespace Model;

class sections extends ActiveRecord {
    protected static $tabla = 'sections';
    protected static $columnasDB = ['id', 'nombre', 'estado', 'fechacreacion', 'fechaupdate'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->estado = $args['estado'] ?? 1;
        $this->fechacreacion = $args['fechacreacion'] ?? date('Y-m-d H:i:s');
        $this->fechaupdate = $args['fechaupdate'] ?? date('Y-m-d H:i:s');
    }

    // Validación para secciones nuevos
    public function validar_nuevo_cliente():array {
        if(!$this->nombre)self::$alertas['error'][] = 'El Nombre de la seccion es Obligatorio';
        if(strlen($this->nombre)>40)self::$alertas['error'][] = 'Has excecido el limite de caracteres';
        return self::$alertas;
    }

    
}