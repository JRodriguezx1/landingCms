<?php
namespace Model;

class clientes extends ActiveRecord {
    protected static $tabla = 'clientes';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'tipodocumento', 'identificacion', 'telefono', 'email', 'fecha_nacimiento'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->tipodocumento = $args['tipodocumento'] ?? '';
        $this->identificacion = $args['identificacion'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->fecha_nacimiento = $args['fecha_nacimiento'] ?? '';
    }

    // Validación para clientes nuevos
    public function validar_nuevo_cliente():array {
        if(!$this->nombre)self::$alertas['error'][] = 'El Nombre del cliente es Obligatorio';
        
        if(strlen($this->nombre)>32)self::$alertas['error'][] = 'Has excecido el limite de caracteres';
        
        if(!$this->apellido || strlen($this->apellido)>32)self::$alertas['error'][] = 'El apellido del cliente no debe ir vacio o ser mayor a 32 digitos';
        
        //if(!$this->identificacion)self::$alertas['error'][] = 'La identificacion del cliente es Obligatorio';

        //if(strlen($this->identificacion)<7 || strlen($this->identificacion)>11)self::$alertas['error'][] = 'La identificacion no debe ser menor a 7 digitos o mayor a 11 digitos';
        
        if(!$this->telefono)self::$alertas['error'][] = 'El telefono del cliente es Obligatorio';

        if(!is_numeric($this->telefono) || strlen($this->telefono) >10)self::$alertas['error'][] = 'El telefono es incorrecto o debe ser de 10 digitos';

        if($this->email)if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) self::$alertas['error'][] = 'Email no válido';

       // if(strlen($this->direccion)>74)self::$alertas['error'][] = 'Direccion muy larga';

        return self::$alertas;
    }

    

    
}