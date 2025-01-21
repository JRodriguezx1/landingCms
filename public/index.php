<?php 

require_once __DIR__ . '/../includes/app.php'; //apunta al directorio raiz y luego a app.php, el archivo app contiene: las variables de entorno para el deploy,
                    //la clase ActiveRecord, el autoload de composer = localizador de clases, archivo de funciones debuguear y sanitizar html
                    //archivo de conexion de bd mysql con variables de entorno y me establece la conexion mediante: ActiveRecord::setDB($db);

//me importa clases del controlador

use Controllers\logincontrolador; //clase para logueo, registro de usuario, recuperacion, deslogueo etc..
use Controllers\dashboardcontrolador;
use Controllers\contabilidadcontrolador;
use Controllers\almacencontrolador;
use Controllers\cajacontrolador;
use Controllers\ventascontrolador;
use Controllers\reportescontrolador;
use Controllers\clientescontrolador;
use Controllers\direccionescontrolador;
use Controllers\configcontrolador;
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
//$router->get('/', [paginacontrolador::class, 'index']);
$router->get('/', [logincontrolador::class, 'login']);


/////area dashboard/////
$router->get('/admin/dashboard', [dashboardcontrolador::class, 'index']);
$router->get('/admin/perfil', [dashboardcontrolador::class, 'perfil']);
$router->post('/admin/perfil', [dashboardcontrolador::class, 'perfil']);
$router->get('/admin/perfil/cambiarpassword', [dashboardcontrolador::class, 'cambiarpassword']);
$router->post('/admin/perfil/cambiarpassword', [dashboardcontrolador::class, 'cambiarpassword']);
$router->get('/admin/viewmobile', [dashboardcontrolador::class, 'viewmobile']);
///// area de contabilidad /////
$router->get('/admin/contabilidad', [contabilidadcontrolador::class, 'index']);

///// area de reportes /////
$router->get('/admin/reportes', [reportescontrolador::class, 'index']);
$router->get('/admin/reportes/ventasgenerales', [reportescontrolador::class, 'ventasgenerales']);
$router->get('/admin/reportes/cierrescaja', [reportescontrolador::class, 'cierrescaja']);
$router->get('/admin/reportes/zdiario', [reportescontrolador::class, 'zdiario']);
$router->get('/admin/reportes/ventasxtransaccion', [reportescontrolador::class, 'ventasxtransaccion']);
///// area de clientes /////
$router->get('/admin/clientes', [clientescontrolador::class, 'index']);
$router->post('/admin/clientes', [clientescontrolador::class, 'index']); //filtro de busqueda
$router->post('/admin/clientes/crear', [clientescontrolador::class, 'crear']);
$router->post('/admin/clientes/actualizar', [clientescontrolador::class, 'actualizar']);
$router->get('/admin/clientes/detalle', [clientescontrolador::class, 'detalle']);
$router->get('/admin/clientes/hab_desh', [clientescontrolador::class, 'hab_desh']); //habilitar deshabilitar cliente
///// area de configuracion /////
$router->get('/admin/configuracion', [configcontrolador::class, 'index']);






$router->post('/admin/api/apiCrearCliente', [clientescontrolador::class, 'apiCrearCliente']);  // crear cliente desde modulo de ventas.ts
$router->get('/admin/api/direccionesXcliente', [direccionescontrolador::class, 'direccionesXcliente']); //obtener direcciones segun cliente elegido en ventas.ts
$router->post('/admin/api/addDireccionCliente', [direccionescontrolador::class, 'addDireccionCliente']); //add direccion segun cliente elegido desde ventas.ts

$router->post('/admin/api/declaracionDinero', [cajacontrolador::class, 'declaracionDinero']);  //aip llamada desde cerrarcaja.ts
$router->post('/admin/api/arqueocaja', [cajacontrolador::class, 'arqueocaja']);  //aip llamada desde cerrarcaja.ts
$router->post('/admin/api/cierrecajaconfirmado', [cajacontrolador::class, 'cierrecajaconfirmado']);  //aip llamada desde cerrarcaja.ts





//////***************************/***NO**************************//////
////// api de categorias y servicios //////
$router->post('/admin/api/updateStateCategoria', [servicioscontrolador::class ,'updateStateCategoria']); //fetch en servicios.js para cambiar estado categoria
$router->post('/admin/api/actualizarCategoria', [servicioscontrolador::class ,'actualizarCategoria']); //fetch en servicios.js para actualizar categoria
//$router->post('/admin/api/eliminarCategoria', [servicioscontrolador::class , 'eliminarCategoria']); //fetch en servicios.js para eliminar categoria
$router->post('/admin/api/actualizarServicio', [servicioscontrolador::class, 'actualizarServicio']); //fetch en editarservicos.js para actulaizar el servicio
$router->post('/admin/api/eliminarservicio', [servicioscontrolador::class, 'eliminar']); //fetch en servicios.js
$router->get('/admin/api/getservices', [servicioscontrolador::class, 'getservices']); //fetch en calendariocitas.js y 1app.js


////// api de configuracion //////
$router->get('/admin/api/getAllemployee', [adminconfigcontrolador::class, 'getAllemployee']); //fetch en empleados.js
$router->post('/admin/api/actualizarEmpleado', [adminconfigcontrolador::class, 'actualizarEmpleado']); //fetch llamado en empleados.js
$router->post('/admin/api/actualizarSkillsEmpleado', [adminconfigcontrolador::class, 'actualizarSkillsEmpleado']); //fetch llamado en empleados.js
$router->post('/admin/api/eliminarEmpleado', [adminconfigcontrolador::class, 'eliminarEmpleado']); //fetch llamado en empleados.js
$router->get('/admin/api/getmalla', [adminconfigcontrolador::class, 'getmalla']); //fetch en malla.js y en
$router->get('/admin/api/malla', [adminconfigcontrolador::class, 'malla']);
$router->get('/admin/api/getfechadesc', [adminconfigcontrolador::class, 'getfechadesc']);  //fetch en fechadesc.js y en 
$router->get('/admin/api/deletefechadesc', [adminconfigcontrolador::class, 'deletefechadesc']);  //metodo para eliminar fecha llamado desde fechadesc.js
$router->get('/admin/api/getemployee_services', [citascontrolador::class, 'getemployee_services']); //metodo llamado desde 

$router->get('/admin/api/allclientes', [clientescontrolador::class, 'allclientes']); // me trae todos los clientes o usuarios desde citas.js
$router->get('/admin/api/alldays', [dashboardcontrolador::class, 'alldays']); // me trae todos los dias desde graficas.js
$router->get('/admin/api/totalcitas', [dashboardcontrolador::class, 'totalcitas']); 
$router->get('/admin/api/detallepagoxcita', [factcontrolador::class, 'detallepagoxcita']); //api se ejecuta en el modulo de citas en admin
$router->get('/admin/api/anularpagoxcita', [factcontrolador::class, 'anularpagoxcita']); //api se ejecuta en el modulo de citas en admin
$router->get('/admin/api/getmediospago', [configcontrolador::class, 'getmediospago']); //api llamada desde configuracion.js
$router->post('/admin/api/setmediospago', [configcontrolador::class, 'setmediospago']); //api llamada desde configuracion.js para setear los medios de pago
$router->post('/admin/api/coloresapp', [configcontrolador::class, 'coloresapp']); //api establecer colores app
$router->post('/admin/api/tiemposervicio', [configcontrolador::class, 'tiemposervicio']); //api establecer tiempo de servicio
$router->get('/admin/api/gettimeservice', [configcontrolador::class, 'gettimeservice']); //api para traer el tiempo de duracion general del servicio


$router->comprobarRutas();
