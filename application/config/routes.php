<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "catalogo";
$route['404_override'] = '';





$route['adminlogin'] = 'login/index';
$route['login/validar'] = 'login/iniciarsesion';
$route['logout'] = 'login/cerrarsesion';


$route['cliente'] = 'cliente/index';
$route['cliente/direcciones/(:num)/borrar'] = "cliente/borrarDireccion/$1";
$route['cliente/(:num)/direcciones/crear'] = "cliente/crearDireccion/$1";
$route['cliente/(:num)/direcciones/(:num)/modificar'] = 'cliente/modificarDireccion/$2/$1';




//esto es, localhost/iw/admin
$route['admin'] = "tienda/admin"; //pagina de administracion de tienda
$route['admin/tiendas/(:num)/editar'] = 'tienda/editar';
$route['admin/tiendas/crear'] = 'tienda/nuevo';
$route['admin/tiendas/(:num)/borrar'] = 'tienda/borrar/$1';

$route['admin/tiendas/(:num)'] = 'producto/index/$1';
$route['admin/tiendas/(:num)/crearprod'] = 'producto/nuevo/$1';
$route['admin/tiendas/(:num)/borrarprod/(:num)'] = 'producto/borrar/$2';
$route['admin/tiendas/(:num)/editarprod/(:num)'] = 'producto/editar/$2';


$route['admin/tiendas/(:num)/productos/(:num)'] = 'caracteristica/index/$2/$1'; //pagina de administracion de caracteristicas de producto
$route['admin/tiendas/(:num)/productos/(:num)/crearcaracteristica'] = 'caracteristica/nuevo/$2';
$route['admin/tiendas/(:num)/productos/(:num)/caracteristica/(:num)/borrar'] = 'caracteristica/borrar/$3';
$route['admin/tiendas/(:num)/productos/(:num)/caracteristica/(:num)/editar'] = 'caracteristica/editar/$3';


$route['admin/categorias'] = "categoria/index"; //PAGINA DE ADMINISTRACION DE CATEGORIAS DE TIENDA
$route['admin/categorias/crear'] = 'categoria/nuevo'; //CREAR
$route['admin/categorias/(:num)/borrar'] = 'categoria/borrar/$1'; //BORRAR
$route['admin/categorias/(:num)/editar'] = 'categoria/editar/$1'; //EDITAR

//administrar subcategorias de una categoria de tienda
$route['admin/categorias/(:num)/crearsubcat'] = "subcategoria/nuevo/$1"; //CREAR SUBCATEGORIA
$route['admin/categorias/(:num)/subcat/(:num)/borrar'] = "subcategoria/borrar/$2"; //BORRAR SUBCATEGORIA
$route['admin/categorias/(:num)/subcat/(:num)/editar'] = "subcategoria/editar/$2"; //EDITAR SUBCATEGORIA