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
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route = array(
	'default_controller' 					=> 'User',
	'404_override'							=> '404_override',
	'translate_uri_dashes'					=> FALSE,


	// employee view
	'login'									=> 'User/login',

	'aboutus'								=> 'User/aboutus',
	'authentication'						=> 'User/authentication',
	'leave'									=> 'User/leave',
	'leave/(:num)'							=> 'User/leave_data/$1',
	'leave_history'							=> 'User/leave_history',
	'profile'								=> 'User/profile',
	'logs'									=> 'User/logs',
	'payslips'								=> 'User/payslips',
	'payslip'								=> 'User/payslip',
	// page views

	'cms' 									=> 'Admin',

	'cms/login'								=> 'Admin/login',
	'cms/about_us'							=> 'Admin/about_us',
	'cms/employee_type'						=> 'Admin/employee_type',
	'cms/leave_type'						=> 'Admin/leave_type',

	'cms/profile'							=> 'Admin/profile',
	'cms/logout'							=> 'Admin/logout',
	'cms/attendance'						=> 'Admin/attendance',
	'cms/position'							=> 'Admin/position',
	'cms/schedule'							=> 'Admin/schedule',
	'cms/employee'							=> 'Admin/employee',
	'cms/a_employee'						=> 'Admin/a_employee',
	'cms/holiday'							=> 'Admin/holiday',

	'cms/payroll'							=> 'Admin/payroll',
	'cms/backup'							=> 'Admin/backup',
	'cms/payroll_per_year'					=> 'Admin/payroll_per_year',
	'cms/payroll_employers'					=> 'Admin/payroll_employers',
	'cms/payslip'							=> 'Admin/payslip',
	
	
	'cms/view_employee/(:num)'				=> 'Admin/view_employee/$1',

	'cms/pending_leaves'					=> 'Admin/pending_leaves',
	'cms/leave'								=> 'Admin/leave',
	// post method
	'update_profile_admin'					=> 'Admin/update_profile_admin',
	'Uploadmyimageadmin'					=> 'Admin/uploadmyimageadmin',
	


	// all page function
	'logout'								=> 'Admin/logout',
	'update_password_admin'					=> 'Admin/update_password_admin',	




	
);