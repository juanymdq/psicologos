<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = 'welcome';
$route['default_controller'] = 'principal/index';

//ENRUTAMIENTO PARA EL CLIENTE********************************************

//$route['cliente'] = 'Cliente';
$route['cliente/login'] = 'Cliente';
$route['cliente/log_in'] = 'Cliente/login_cliente';
$route['cliente/cpanel'] = 'Cliente/cliente_cpanel';
$route['cliente/crear'] = 'Cliente';
$route['cliente/restablecer_password'] = 'cliente/forgot_password';
//lo que se muestra en la URL    = Ruta del controlador interno
$route['cliente/editar/(:any)'] = 'Cliente/cliente_save/$1';
$route['cliente/mensaje/(:any)'] = 'Cliente/mensajes_cliente/$1';
//************************************************************************
$route['cliente/listar_profesionales'] = 'Turnos';
$route['cliente/ver_horarios_de_profesional/(:any)'] = 'Turnos/ver_horarios/$1';
$route['profesional/crear_horarios_de_profesional/(:any)'] = 'Turnos/ver_horarios/$1';
$route['cliente/datos_del_turno/(:any)'] = 'Turnos/turno_cliente/$1';
$route['cliente/mis_turnos/(:any)'] = 'cliente/ver_turnos/$1';
//*************************************************************************
$route['profesional/login'] = 'Profesional';
$route['profesional/log_in'] = 'Profesional/login_profesionales';
$route['profesional/cpanel'] = 'Profesional/profesional_cpanel';
$route['profesional/crear'] = 'Profesional';
$route['profesional/guardar'] = 'Profesional/profesional_save';
$route['profesional/restablecer_password'] = 'Profesional/forgot_password';
$route['profesional/crear_horarios_de_atencion/(:any)'] = 'profesional/find_all_eventos/$1';
//ingresda al calendario para cargar horarios
$route['profesional/calendario_de_horarios/(:any)/(:any)'] = 'calendar/find_all_eventos/$1/$2';

$route['profesional/agregar_horario/(:any)'] = 'Turnos/accion/$1';
$route['profesional/editar/(:any)'] = 'Profesional/profesional_save/$1';
$route['profesional/mensaje/(:any)'] = 'Profesional/mensajes_profesional/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
