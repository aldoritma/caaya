<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/
$route['user/roles/(:num)/update'] = 'user/update_roles/$1';
$route['user/roles/(:num)/edit'] = 'user/edit_roles/$1';
$route['user/(:num)/update'] = 'user/update/$1';
$route['user/(:num)/edit'] = 'user/edit/$1';
$route['user/roles/create'] = 'user/create_roles';
$route['user/roles/add'] = 'user/add_roles';
$route['user/roles/add-permission'] = 'user/add_roles_permission';
$route['user/roles/create-roles-permission'] = 'user/create_roles_permission';
$route['user/roles/update-roles-permission'] = 'user/update_roles_permission';
$route['user/account-setting'] = 'user/account_setting';
$route['user/account-setting/post'] = 'user/account_setting_post';
$route['user/add-user'] = 'user/add';
$route['user/list-user'] = 'user/index';

/* End of file routes.php */
/* Location: ./application/modules/user/config/routes.php */