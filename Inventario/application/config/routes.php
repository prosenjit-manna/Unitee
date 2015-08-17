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
|	http://codeigniter.com/user_guide/general/routing.html
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

include APPPATH . "helpers/setup_helper.php";

$route['default_controller']        = 'login';
$route['404_override']              = 'dashboard/index';
$route['translate_uri_dashes']      = FALSE;
$route['0']                         = 'dashboard/index';
$route['0/([a-z_-]+)' 
    . system_token() 
    . '([a-z_-]+)']                 = 'dashboard/index/$1=$2';
$route['block']                     = "dashboard/blockscreen";
$route['unlock']                    = "dashboard/unlock";
$route['logout']                    = "dashboard/session";
$route['sidebar']                   = "dashboard/get_sidebar";
$route['avatar']                    = "user/change_avatar";
$route['modules']                   = "dashboard/modulos";

//OTRAS RUTAS 

$route['c/(:any)']                  = "country/GetCountry/$1";