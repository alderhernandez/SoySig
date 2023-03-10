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
|	https://codeigniter.com/userguide3/general/routing.html
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
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/*****procesos */
$route['procesos'] = 'ProcesoController/index';
$route['procesosSearch'] = 'ProcesoController/procesosSearch';
$route['nuevoProcesos'] = 'ProcesoController/nuevoProcesos';
$route['guardarProceso'] = 'ProcesoController/guardarProceso';
$route['editarProceso/(:any)'] = 'ProcesoController/editarProceso/$1';
$route['verGestionesProceso/(:any)'] = 'ProcesoController/verGestionesProceso/$1';
$route['guardarEditarProceso'] = 'ProcesoController/guardarEditarProceso';


/***gestiones */

$route['gestiones'] = 'GestionController/index';
$route['nuevaGestion/(:any)'] = 'GestionController/nuevaGestion/$1';
$route['nuevaGestion'] = 'GestionController/nuevaGestion';
$route['guardarGestion'] = 'GestionController/guardarGestion';
$route['gestionSearch'] = 'GestionController/gestionSearch';
$route['editarGestion/(:any)'] = 'GestionController/editarGestion/$1';
$route['guardarEditarGestion'] = 'GestionController/guardarEditarGestion';
$route['agregarDocumentoGestion/(:any)'] = 'GestionController/agregarDocumentoGestion/$1';
$route['guardarDocumento'] = 'GestionController/guardarDocumento';
$route['editarDocumento/(:any)'] = 'GestionController/editarDocumento/$1';
$route['guardarDocumentoEditar'] = 'GestionController/guardarDocumentoEditar';
$route['verHistorial/(:any)'] = 'GestionController/verHistorial/$1';
$route['login'] = 'Welcome/login';
$route["Acreditar"] = "Welcome/Acreditar";
$route["salir"] = "Welcome/salir";

/*****vistas de gerentes */

$route["gerentesView"] = "GerentesController/gerentesView";
$route["documentosView/(:any)"] = "GerentesController/documentosView/$1";
$route["downloadFile/(:any)"] = "GerentesController/downloadFile/$1";


/******acceso denegado permiso */

$route["denegado"] = "welcome/denegado";