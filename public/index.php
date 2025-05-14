<?php 

require_once __DIR__ . '/../includes/app.php'; //apunta al directorio raiz y luego a app.php, el archivo app contiene: las variables de entorno para el deploy,
                    //la clase ActiveRecord, el autoload de composer = localizador de clases, archivo de funciones debuguear y sanitizar html
                    //archivo de conexion de bd mysql con variables de entorno y me establece la conexion mediante: ActiveRecord::setDB($db);

//me importa clases del controlador

use Controllers\blockscontrolador;
use Controllers\logincontrolador; //clase para logueo, registro de usuario, recuperacion, deslogueo etc..
use Controllers\dashboardcontrolador;
use Controllers\seccionescontrolador;
use Controllers\editorpaginacontrolador;
use Controllers\clientescontrolador;
use Controllers\direccionescontrolador;
use Controllers\configcontrolador;
use Controllers\contactocontrolador;
use Controllers\paginacontrolador;
use Controllers\testimonialescontrolador;
// me importa la clase router
use MVC\Router;  



$router = new Router();



// Login
$router->get('/loginauth', [logincontrolador::class, 'loginauth']);
$router->post('/loginauth', [logincontrolador::class, 'loginauth']);
$router->get('/login', [logincontrolador::class, 'login']);
$router->post('/login', [logincontrolador::class, 'login']);
$router->get('/logout', [logincontrolador::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [logincontrolador::class, 'registro']);
$router->post('/registro', [logincontrolador::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [logincontrolador::class, 'olvide']);
$router->post('/olvide', [logincontrolador::class, 'olvide']);

// Colocar el nuevo password
$router->get('/recuperarpass', [logincontrolador::class, 'recuperarpass']);
$router->post('/recuperarpass', [logincontrolador::class, 'recuperarpass']);

// Confirmación de Cuenta
$router->get('/mensaje', [logincontrolador::class, 'mensaje']);
$router->get('/confirmar-cuenta', [logincontrolador::class, 'confirmar_cuenta']);

//area publica
$router->get('/', [paginacontrolador::class, 'index']);
$router->post('/formcontacto', [contactocontrolador::class, 'formcontacto']);


/////area dashboard/////
$router->get('/admin/dashboard', [dashboardcontrolador::class, 'index']);
$router->get('/admin/perfil', [dashboardcontrolador::class, 'perfil']);
$router->post('/admin/perfil', [dashboardcontrolador::class, 'perfil']);
$router->get('/admin/perfil/cambiarpassword', [dashboardcontrolador::class, 'cambiarpassword']);
$router->post('/admin/perfil/cambiarpassword', [dashboardcontrolador::class, 'cambiarpassword']);
$router->get('/admin/viewmobile', [dashboardcontrolador::class, 'viewmobile']);
///// area de secciones /////
$router->get('/admin/secciones', [seccionescontrolador::class, 'index']);
$router->post('/admin/secciones/crear_seccion', [seccionescontrolador::class, 'crear_seccion']);
///// area de bloques por seccion /////
$router->get('/admin/seccion/block', [blockscontrolador::class, 'getblock']);
$router->get('/admin/seccion/block/ServiciosAdicionales', [blockscontrolador::class, 'ServiciosAdicionales']);  //cuando se visita pagina servicios adicionales
$router->post('/admin/seccion/block/ServiciosAdicionales', [blockscontrolador::class, 'ServiciosAdicionales']);  //crear servicios adicionales
///// area de testimoniales /////
$router->get('/admin/testimoniales', [testimonialescontrolador::class, 'index']);  //cunado se visita pagina testimoniales
$router->post('/admin/testimoniales', [testimonialescontrolador::class, 'index']);  //crear testimoniales
///// area de contadores /////
$router->get('/admin/contadores', [blockscontrolador::class, 'contadores']);  //mostrar contadores
///// area de clientes /////
$router->get('/admin/clientes', [clientescontrolador::class, 'index']);  //mostrar clientes
$router->post('/admin/clientes/crear', [clientescontrolador::class, 'crear']);  //crear clientes
//$router->post('/admin/clientes/actualizar', [clientescontrolador::class, 'actualizar']);
//$router->get('/admin/clientes/detalle', [clientescontrolador::class, 'detalle']);
$router->get('/admin/clientes/hab_desh', [clientescontrolador::class, 'hab_desh']); //habilitar deshabilitar cliente
///// area de configuracion /////
$router->get('/admin/configuracion', [configcontrolador::class, 'index']);
$router->post('/admin/negocio/actualizar', [configcontrolador::class, 'actualizar']); //metodo para actualizar negocio



//////////////////////////////////  API`S //////////////////////////////////////

$router->get('/admin/api/allsections', [seccionescontrolador::class, 'allsections']);
$router->post('/admin/api/editarseccion', [seccionescontrolador::class, 'editarseccion']);
$router->get('/admin/api/bloquearseccion', [seccionescontrolador::class, 'bloquearseccion']);
$router->get('/admin/api/allblocks', [blockscontrolador::class, 'allblocks']);
$router->post('/admin/api/editarBloque', [blockscontrolador::class, 'editarBloque']);

$router->get('/admin/api/allserviciosadicionales', [blockscontrolador::class, 'allserviciosadicionales']);
$router->post('/admin/api/editarServicio', [blockscontrolador::class, 'editarServicio']);  //editar servicio adicional, desde serviciosadicionales.ts
$router->get('/admin/api/eliminarServicio', [blockscontrolador::class, 'eliminarServicio']);  //desde serviciosadicionales.ts
$router->get('/admin/api/alltestimoniales', [testimonialescontrolador::class, 'alltestimoniales']);
$router->post('/admin/api/editarTestimonial', [testimonialescontrolador::class, 'editarTestimonial']);

$router->get('/admin/api/allclientes', [clientescontrolador::class, 'allclientes']); // me trae todos los clientes desde clientes.js
$router->post('/admin/api/actualizarCliente', [clientescontrolador::class, 'apiActualizarcliente']);  //actualizar cliente en clientes.ts
$router->post('/admin/api/eliminarCliente', [clientescontrolador::class, 'apiEliminarCliente']); //eliminar cliente en clientes.ts
$router->post('/admin/api/EditarNota', [clientescontrolador::class, 'apiEditarNota']); //editar la nota del cliente en clientes.ts

$router->comprobarRutas();
