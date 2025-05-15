<?php
namespace Model;

class visitas extends ActiveRecord {
    protected static $tabla = 'visitas';
    protected static $columnasDB = ['id', 'totalvisitas', 'visitashoy', 'fechavisitashoy'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;                     // - 4
        $this->totalvisitas = $args['totalvisitas'] ?? '';   // - 11
        $this->visitashoy = $args['visitashoy'] ?? 1;        // - 7
        $this->fechavisitashoy = $args['fechavisitashoy'] ?? date('Y-m-d');
    }

    // Validación para secciones nuevos
    public function validar():array {
        if(!$this->totalvisitas || !is_numeric($this->totalvisitas))self::$alertas['error'][] = 'El total de visitas es Obligatorio';
        return self::$alertas;
    }

    
}