<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// $route['default_controller'] = 'user/index';
$route['default_controller'] = 'colleger';

$route['bolsistas']                 = 'colleger';
$route['cadastrar/bolsista']        = 'colleger/create';
$route['salvar/bolsista']           = 'colleger/store';
$route['editar/bolsista/(:num)']    = 'colleger/edit/$1';
$route['excluir/bolsista/(:num)']   = 'colleger/delete/$1';
$route['consultar/bolsista/(:num)'] = 'colleger/consult/$1';

$route['espetaculos']                   = 'show';
$route['editar/espetaculo/(:num)']      = 'show/edit/$1';
$route['excluir/espetaculo/(:num)']     = 'show/delete/$1';

$route['editar/bolsista/espetaculo/(:num)/(:num)']      = 'colleger_show/edit/$1/$2';
$route['excluir/bolsista/espetaculo/(:num)/(:num)']     = 'colleger_show/delete/$1/$2';
$route['consultar/bolsista/espetaculo/(:num)/(:num)']   = 'colleger_show/consult/$1/$2';

$route['api/bolsistas']   = 'colleger/api';
$route['api/espetaculos'] = 'show/api';


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
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
