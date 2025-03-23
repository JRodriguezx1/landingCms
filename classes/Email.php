<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use Model\negocio;

class Email {

    public $email;
    public $nombre;
    public $telefono;
    public $mensaje;
    
    public function __construct($email, $nombre, $telefono, $mensaje)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->mensaje = $mensaje;
    }

    public function enviarConfirmacion() { //cunado un interesado se contacta por el formulario
        /*$host = $_SERVER['HTTP_HOST'];  //app_barber.test, cliente1.app_barber.test, cliente2.app_barber.test
        $cliente = explode('.', $host);*/

         // create a new object
         $mail = new PHPMailer();
         $mail->isSMTP();
         $mail->Host = $_ENV['EMAIL_HOST'];//'smtp.gmail.com'; 
         $mail->SMTPAuth = true;
         $mail->SMTPSecure = 'tls'; //'ssl'; //ENCRYPTION_STARTTLS - PHPMailer::ENCRYPTION_SMTPS; //'ssl' = si la url tiene el candado, si no =  'tls'
         $mail->Port = $_ENV['EMAIL_PORT']; //465; para ssl y 587 para tls
         $mail->Username = $_ENV['EMAIL_USER'];
         $mail->Password = $_ENV['EMAIL_PASS'];  
     
         //$negocio = negocio::get(1);
         $mail->setFrom('tramitessinfronteras7@gmail.com');
         $mail->addAddress('tramitessinfronteras7@gmail.com', 'Tramites sin frontera');
         $mail->Subject = 'Interesado desde tramites sin frontera';

         // Set HTML
         $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';

         $contenido = '<html>';
         $contenido .= "<p><strong>Hola, </strong> te ha llegado un correo desde el formulario Tramites sin frontera.</p>";
         $contenido .= '<p>Mensaje: '.$this->mensaje.'</p>';       
         $contenido .= "<p>Enviado por: ".$this->nombre."</p>";
         $contenido .= "<p>Telefono: ".$this->telefono."</p>";
         $contenido .= "<p>Email: ".$this->email."</p>";
         $contenido .= '</html>';
         $mail->Body = $contenido;

         //Enviar el mail
         if(!$mail->send()){
             debuguear($mail->ErrorInfo);
         }else{
            return true;
         }

    }
}