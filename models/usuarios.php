<?php

namespace Model;

class usuarios extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'cedula', 'movil', 'email', 'password', 'usuario', 'confirmado', 'token', 'perfil'];
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->cedula = $args['cedula'] ?? '';
        $this->movil = $args['movil'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->usuario = $args['usuario'] ?? 'usuario';
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->perfil = $args['perfil'] ?? null;
    }

    // Validar el Login de Usuarios
    public function validarLoginauth() {  //validacion para admin y soporte
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email del Usuario es Obligatorio';  
        }  
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        return self::$alertas;

    }

    public function validarLogin() {  //validacion para usuarios
        /*if(!$this->email) {
            self::$alertas['error'][] = 'El Email del Usuario es Obligatorio';  
        }  
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }*/
        if(!$this->movil || !is_numeric($this->movil) ) {
            self::$alertas['error'][] = 'El Movil no es correcto';
        }
        if(strlen($this->movil)<10 || strlen($this->movil)>10){
            self::$alertas['error'][] = 'El Movil debe tener 10 digitos';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        return self::$alertas;

    }

    // Validación para cuentas nuevas
    public function validar_nueva_cuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->movil || !is_numeric($this->movil) ) {
            self::$alertas['error'][] = 'El Movil no es correcto';
        }
        if(strlen($this->movil)<10 || strlen($this->movil)>10){
            self::$alertas['error'][] = 'El Movil debe tener 10 digitos';
        }
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!$this->password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        if(strlen($this->password) != 4) {
            self::$alertas['error'][] = 'El password debe ser igual a 4 digitos';
        }
        if(!is_numeric($this->password)) {
            self::$alertas['error'][] = 'El Password debe ser numerico';
        }
        if($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Los password son diferentes';
        }
        return self::$alertas;
    }

    // Valida un email
    public function validarEmail() {
        if(!$this->email) {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }
        return self::$alertas;
    }

    // Valida el Password 
    public function validarPassword() {
        if(!$this->password) {
            self::$alertas['error'][] = 'El Password no puede ir vacio';
        }
        if(strlen($this->password) < 6) {
            self::$alertas['error'][] = 'El password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    public function nuevo_password() : array {
        if(!$this->password_actual) {
            self::$alertas['error'][] = 'El Password Actual no puede ir vacio';
        }
        if(!$this->password_nuevo) {
            self::$alertas['error'][] = 'El Password Nuevo no puede ir vacio';
        }
        if(strlen($this->password_nuevo) < 6) {
            self::$alertas['error'][] = 'El Password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }

    // Comprobar el password
    public function comprobar_password($passwordform) : bool 
    {
        return password_verify($passwordform, $this->password );
    }

    // Hashea el password
    public function hashPassword() : void 
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Generar un Token
    public function crearToken() : void 
    {
        $this->token = uniqid();
    }


    public function validarimgempleado($FILE) {
        if($FILE['img']['name'] && $FILE['img']['size']>550000) {
            self::$alertas['error'][] = 'La foto no puede pasar los 500KB';
        }
        if($FILE['img']['name'] && $FILE['img']['type']!="image/jpeg" && $FILE['img']['type']!="image/png") {
            self::$alertas['error'][] = 'Seleccione una imagen en formato jpeg o png';
        }
        return self::$alertas;
    }
}