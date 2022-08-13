<?php
defined('BASEPATH') or exit('No direct script access allowed');

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


MVC
URL = CONTROLLER/function
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['danh-sach-san-pham'] = 'Views/HomeController/lists';

$route['chi-tiet-san-pham'] = 'Views/HomeController/products';

$route['chi-tiet-don-hang'] = 'Views/HomeController/cart_details';

$route['thanh-toan-don-hang'] = 'Views/HomeController/bill_information';

$route['admin'] = 'Admin/AdminController/index';

$route['admin/login'] = 'Admin/AdminController/login';

$route['admin/admin_user'] = 'Admin/AdminController/admin_user';

$route['admin/category'] = 'Admin/CategoryController/index';

$route['admin/category/add'] = 'Admin/CategoryController/add';

$route['admin/category/edit'] = 'Admin/CategoryController/edit';

$route['admin/manufacturer'] = 'Admin/ManufacturerController/index';

$route['admin/manufacturer/add'] = 'Admin/ManufacturerController/add';

$route['admin/manufacturer/edit'] = 'Admin/ManufacturerController/edit';

$route['admin/logout'] = 'Admin/AdminController/logout';

$route['admin/layout'] = 'Admin/AdminController/layout';

$route['admin/validate'] = 'Admin/AdminController/validate';

$route['admin/products'] = 'Admin/ProductsController/index';
