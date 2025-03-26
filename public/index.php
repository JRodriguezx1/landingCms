<?php 

require_once __DIR__ . '/../includes/app.php'; //apunta al directorio raiz y luego a app.php, el archivo app contiene: las variables de entorno para el deploy,
                    //la clase ActiveRecord, el autoload de composer = localizador de clases, archivo de funciones debuguear y sanitizar html
                    //archivo de conexion de bd mysql con variables de entorno y me establece la conexion mediante: ActiveRecord::setDB($db);

//me importa clases del controlador

use Controllers\logincontrolador; //clase para logueo, registro de usuario, recuperacion, deslogueo etc..
use Controllers\dashboardcontrolador;
use Controllers\seccionescontrolador;
use Controllers\editorpaginacontrolador;
use Controllers\clientescontrolador;
use Controllers\direccionescontrolador;
use Controllers\configcontrolador;
use Controllers\contactocontrolador;
use Controllers\paginacontrolador;

// me importa la clase router
use MVC\Router;  



$router = new Router();



// Login
$router->get('/loginauth', [logincontrolador::class, 'loginauth']);
$router->post('/loginauth', [logincontrolador::class, 'loginauth']);
$router->get('/login', [logincontrolador::class, 'login']);
$router->post('/login', [logincontrolador::class, 'login']);
$router->post('/logout', [logincontrolador::class, 'logout']);

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

///// area de reportes /////
$router->get('/admin/editarpagina', [editorpaginacontrolador::class, 'index']);
///// area de clientes /////
$router->get('/admin/clientes', [clientescontrolador::class, 'index']);
$router->post('/admin/clientes', [clientescontrolador::class, 'index']); //filtro de busqueda
$router->post('/admin/clientes/crear', [clientescontrolador::class, 'crear']);
$router->post('/admin/clientes/actualizar', [clientescontrolador::class, 'actualizar']);
$router->get('/admin/clientes/detalle', [clientescontrolador::class, 'detalle']);
$router->get('/admin/clientes/hab_desh', [clientescontrolador::class, 'hab_desh']); //habilitar deshabilitar cliente
///// area de configuracion /////
$router->get('/admin/configuracion', [configcontrolador::class, 'index']);



//////////////////////////////////  API`S //////////////////////////////////////

$router->get('/admin/api/allsections', [seccionescontrolador::class, 'allsections']);
//////////////////////////////  NO  ///////////////////////////////////
$router->post('/admin/api/apiCrearCliente', [clientescontrolador::class, 'apiCrearCliente']);  // crear cliente desde modulo de ventas.ts
$router->get('/admin/api/direccionesXcliente', [direccionescontrolador::class, 'direccionesXcliente']); //obtener direcciones segun cliente elegido en ventas.ts





$router->comprobarRutas();
