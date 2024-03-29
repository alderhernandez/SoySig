<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['salir'] = 'welcome/salir';

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

/*******permisos*******/
$route["asignarPermisos"] = "PermisosController/asignarPermisos";

/******acceso denegado permiso */
$route["denegado"] = "welcome/denegado";