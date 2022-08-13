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
// (:any) -> thể hiện 1 chuỗi bất kỳ 12312312aabc-zxczxc
// (:num) -> thể hiện 1 dãy số VD: 1234

// Url: (:any)-kitu{$id}: VD: may-cham-cong-may-cham-cong-van-tay-500-p1.html

// $route['(:any)-p(:num).html'] = 'Views/ProductController/show/$1/$2';

// $route['(:any)-m(:num).html'] = 'Views/ManufacturerController/index/$1/$2';

// $route['(:any)-c(:num).html'] = 'Views/CategoryController/index/$1/$2';

$route['(:any)-vlt(:num)c(:num)d(:num).html']= 'Views/Home/HomeController/list_news/$1/$2/$3/$4';

$route['(:any)-gvt(:num)c(:num)d(:num).html'] = 'Views/Home/HomeController/list_employee/$1/$2/$3/$4';

$route['tim-giup-viec-quanh-day.html'] = 'Views/Home/HomeController/list_employee_around';

$route['(:any)-gv(:num).html'] = 'Views/Home/HomeController/employee_detail/$1/$2';

$route['(:any)-pgv(:num).html'] = 'Views/Home/HomeController/employee_profile/$1/$2';

$route['(:any)-n(:num).html'] = 'Views/Home/HomeController/new_detail/$1/$2';

$route['(:any)-c(:num).html'] = 'Views/Home/HomeController/company_detail/$1/$2';

$route['login'] = 'Views/Home/User/LoginController/index';
// login employee  
$route['login/employee'] = 'Views/Home/User/LoginController/login_employee';
$route['login/action-login-employee'] = 'Handles/Home/UserController/login_employee';
$route['forgot-password-employee'] = 'Views/Home/User/UserController/forgot_password_employee';
$route['handle-forgot-password-employee'] = 'Handles/Home/UserController/forgot_password';
<<<<<<< HEAD
$route['employee-reset-password/(:any).html'] = 'Handles/Home/UserController/reset_password/$1';
=======
$route['employee-reset-password-token-(:any).html'] = 'Handles/Home/UserController/reset_password/$1';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
// login company  
$route['login/company'] = 'Views/Home/User/LoginController/login_company';
$route['login/action-login-company'] = 'Handles/Home/CompanyController/login_company';
$route['forgot-password-company'] = 'Views/Home/User/CompanyController/forgot_password_company';
$route['handle-forgot-password-company'] = 'Handles/Home/CompanyController/forgot_password';
<<<<<<< HEAD
$route['company-reset-password/(:any).html'] = 'Handles/Home/CompanyController/reset_password/$1';
=======
$route['company-reset-password-token-(:any).html'] = 'Handles/Home/CompanyController/reset_password/$1';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769

$route['/'] = 'Views/Home/HomeController/index';

$route['employee-verify-success/(:any).html'] = 'Handles/Home/UserController/register_employee_success/$1';

$route['company-verify-success/(:any).html'] = 'Handles/Home/CompanyController/register_company_success/$1';

$route['register'] = 'Views/Home/User/UserController/index';

$route['register/employee'] = 'Views/Home/User/UserController/register_employee';

$route['register-employee'] = 'Handles/Home/UserController/register_employee';

$route['check-email-employee'] = 'Handles/Home/UserController/check_email_employee';

$route['not-complete-employee'] = 'Handles/Home/UserController/not_complete_employee';

$route['get-list-district'] = 'Handles/Home/GetDistrictController/get_list_district';

$route['register/company'] = 'Views/Home/User/UserController/register_company';

$route['register-company'] = 'Handles/Home/CompanyController/register_company';

$route['check-email-company'] = 'Handles/Home/CompanyController/check_email_company';

$route['not-complete-company'] = 'Handles/Home/CompanyController/not_complete_company';

$route['register/employee/success'] = 'Views/Home/User/UserController/register_employee_success';

$route['register/company/success'] = 'Views/Home/User/UserController/register_company_success';

$route['register/employee/verify'] = 'Views/Home/User/VerifyController/verify_employee';

$route['register/company/verify'] = 'Views/Home/User/VerifyController/verify_company';

$route['resend-email-employee'] = 'Handles/Home/UserController/resend_email';

$route['resend-forgot-email-employee'] = 'Handles/Home/UserController/resend_email_forgot';

$route['resend-forgot-email-company'] = 'Handles/Home/CompanyController/resend_email_forgot';

$route['handle-reset-password-employee'] = 'Handles/Home/UserController/handle_reset_password';

$route['handle-reset-password-company'] = 'Handles/Home/CompanyController/handle_reset_password';

$route['resend-email-company'] = 'Handles/Home/CompanyController/resend_email';

$route['forgot-password'] = 'Views/Home/User/UserController/forgot_password';

$route['employee-forgot-password-send'] = 'Views/Home/User/UserController/forgot_password_send';

$route['company-forgot-password-send'] = 'Views/Home/User/CompanyController/forgot_password_send';

$route['reset-password'] = 'Views/Home/User/UserController/reset_password';

$route['reset-password-success'] = 'Views/Home/User/UserController/reset_password_success';

$route['user/error'] = 'Views/Home/User/UserController/error';

$route['logout'] = 'Handles/Home/UserController/logout';

$route['account-manager'] = 'Views/Home/AccountController/general';

$route['account-manager/list-apply'] = 'Views/Home/AccountController/list_apply';

$route['account-manager/list-saved'] = 'Views/Home/AccountController/list_save';

$route['account-manager/list-accepted'] = 'Views/Home/AccountController/list_accept';

$route['account-manager/profile'] = 'Views/Home/AccountController/profile';

$route['account-manager/change-password'] = 'Views/Home/AccountController/change_password';

<<<<<<< HEAD
$route['account-manager/new-post'] = 'Views/Home/AccountController/new_post';

$route['account-manager/list-post'] = 'Views/Home/AccountController/list_post';

$route['account-manager/edit-post'] = 'Views/Home/AccountController/edit_post';

$route['account-manager/list-worker-point'] = 'Views/Home/AccountController/list_worker_point';

=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
$route['change-employee-status'] = 'Handles/Home/AccountController/change_employee_status';

$route['renew-profile'] = 'Handles/Home/AccountController/renew_profile';

$route['unsave-new'] = 'Handles/Home/AccountController/unsave_new';

<<<<<<< HEAD
$route['unsave-employee'] = 'Handles/Home/AccountController/unsave_employee';

=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
$route['unapply-new'] = 'Handles/Home/AccountController/unapply_new';

$route['update-user-profile'] = 'Handles/Home/AccountController/update_user_profile';

<<<<<<< HEAD
$route['update-user-image'] = 'Handles/Home/AccountController/update_image';

$route['update-company-image'] = 'Handles/Home/AccountController/update_image';

$route['change-password'] = 'Handles/Home/AccountController/change_password';

$route['action-save-employee'] = 'Handles/Home/HomeController/action_save_employee';

$route['change-new-status'] = 'Handles/Home/AccountController/change_new_status';

$route['submit-post'] = 'Handles/Home/AccountController/submit_post';

$route['update-post'] = 'Handles/Home/AccountController/update_post';

$route['update-apply-status'] = 'Handles/Home/AccountController/update_apply_status';


//route admin

$route['admin'] = 'Views/Admin/AdminController/index';

$route['admin/login'] = 'Views/Admin/AdminController/login';

$route['admin/logout'] = 'Views/Admin/AdminController/logout';

$route['admin/list_employee']='Views/Admin/EmployeeController/index';

$route['admin/add_employee']='Views/Admin/EmployeeController/add';

$route['admin/just_update_profile']='Views/Admin/EmployeeController/just_update_profile';

$route['admin/update_employee/(:num)']='Views/Admin/EmployeeController/update/$1';

$route['admin/not_complete_employee']='Views/Admin/EmployeeController/not_complete_employee';

$route['admin/register_for_employee/(:num)']='Views/Admin/EmployeeController/register_for_profile/$1';

$route['admin/search_employee']='Views/Admin/EmployeeController/search_employee';

$route['admin/search_employee_not_complete_profile']='Views/Admin/EmployeeController/search_employee_not_complete_profile';

$route['admin/list_account']='Views/Admin/AccountController/list_account';

$route['admin/add_account']='Views/Admin/AccountController/add_account';

$route['admin/edit_account/(:num)']='Views/Admin/AccountController/edit_account/$1';

$route['admin/list_company']='Views/Admin/CompanyController/index';

$route['admin/search_company']='Views/Admin/CompanyController/search_company';

$route['admin/add_company']='Views/Admin/CompanyController/add';

$route['admin/edit_company/(:num)']='Views/Admin/CompanyController/edit/$1';

$route['admin/not_complete_company']='Views/Admin/CompanyController/not_complete_company';

$route['admin/search_company_not_complete_profile']='Views/Admin/CompanyController/search_company_not_complete_profile';

$route['admin/register_for_company/(:num)']='Views/Admin/CompanyController/register_for_company/$1';

$route['admin/no_post_company']='Views/Admin/CompanyController/no_post_company';

$route['admin/search_no_post_company']='Views/Admin/CompanyController/search_no_post_company';

$route['admin/manage_point_company']='Views/Admin/CompanyController/manage_point_company';

$route['admin/history_point/(:num)']='Views/Admin/CompanyController/history_point/$1';

$route['admin/search_history_point']='Views/Admin/CompanyController/search_history_point';

$route['admin/add_point_company/(:num)']='Views/Admin/CompanyController/add_point_company/$1';

$route['admin/list_news']='Views/Admin/NewsController/index';

$route['admin/search_news']='Views/Admin/NewsController/search_news';

$route['admin/add_news']='Views/Admin/NewsController/add';

$route['admin/edit_news/(:num)']='Views/Admin/NewsController/edit/$1';

$route['admin/list_tag']='Views/Admin/TagController/index';

$route['admin/search_tag']='Views/Admin/TagController/search_tag';

$route['admin/add_tag']='Views/Admin/TagController/add';

$route['admin/edit_tag/(:num)']='Views/Admin/TagController/edit/$1';

$route['admin/post_worker']='Views/Admin/PostController/post_worker';

$route['admin/post_job']='Views/Admin/PostController/post_job';

$route['admin/list_post_tag_worker']='Views/Admin/PostController/list_post_tag_worker';

$route['admin/list_post_tag_job']='Views/Admin/PostController/list_post_tag_job';

$route['admin/search_tag_worker']='Views/Admin/PostController/search_tag_worker';

$route['admin/search_tag_job']='Views/Admin/PostController/search_tag_job';

$route['admin/edit_post_tag/(:num)']='Views/Admin/PostController/edit_post_tag/$1	';
=======
$route['update-user-image'] = 'Handles/Home/AccountController/update_user_image';

$route['change-password'] = 'Handles/Home/AccountController/change_password';
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
