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
$route['default_controller'] = 'User_ctrl';
$route['dologin'] = 'user_ctrl/dologin';
$route['register'] = 'user_ctrl/register_form';
$route['recover_password'] = 'user_ctrl/recover_password';
$route['reset_password'] = 'user_ctrl/reset_password';
$route['update_password'] = 'user_ctrl/update_password';
$route['logout'] = 'user_ctrl/logout';
$route['dashboard'] = 'profile/dashboard';
$route['add_profile'] = 'profile/contactprofile';
$route['edituser/(:any)'] = 'seller/contactprofile/$1';
$route['addProducts'] = 'seller/addProducts';
$route['manageProducts'] = 'seller/manageProducts';
$route['viewProducts/(:any)'] = 'seller/view_product/$1';
$route['editProduct/(:any)'] = 'seller/edit_product_id/$1';
$route['manageCategory'] = 'seller/manageCategory';
$route['productsCategory/(:any)'] = 'seller/manageProducts/$1';
$route['productsCategory/(:any)'] = 'seller/manageProducts/$1';
$route['editCategory/(:any)'] = 'seller/edit_category/$1';
$route['addproductsCategory/(:any)'] = 'seller/addProducts/$1';
$route['addCustomer'] = 'seller/add_customer';
$route['manageCustomers'] = 'seller/list_customers';
$route['addPrincipal'] = 'principal/add_Principal';
$route['updatecustomers'] = 'seller/edit_customer';
$route['updatePrincipal'] = 'principal/edit_principal';
$route['managePrincipal'] = 'Principal/list_Principal';
$route['exportCustomers'] = 'seller/export_customers';
$route['exportPrincipal'] = 'Principal/export_principal';
$route['exportorderreport'] = 'seller/export_report';
//$route['principal/delcontacts'] = 'Principal/delcontacts';
//$route['principal/delproducts'] = 'Principal/delproducts';

$route['customerProfile/(:any)'] = 'seller/detail_customer/$1';
$route['uploadCsv'] = 'seller/upload_csv';
//$route['addOrder'] = 'seller/order';
$route['manageOrder'] = 'seller/view_order';
$route['placeOrder'] = 'seller/placeorder';
$route['addEmails'] = 'seller/addemails';
$route['editEmails'] = 'seller/editemails';
$route['manageplaceOrder'] = 'seller/view_placeorder';
$route['BackupPage'] = 'seller/AllOrderDetail';
$route['BackupList'] = 'seller/BackupList';
$route['updateorder'] = 'seller/edit_order_new';
$route['exportorder'] = 'seller/export_order';
$route['printOrder/(:any)'] = 'seller/print_invoice/$1';
$route['pdf'] = 'seller/pdf_invoice';
$route['mailOrder'] = 'seller/send_mail';
$route['trackOrder'] = 'seller/order_track';
$route['Sales'] = 'seller/sales';
$route['changePassword'] = 'seller/password';
$route['searchRecords'] = 'seller/result_order';
$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = 'seller/error';
$route['orderview/(:num)'] = 'seller/orderview/$1';
$route['datatableTest'] = 'seller/datatableTest';
$route['sendOrdermail/(:num)'] = 'seller/sendOrdermail/$1';