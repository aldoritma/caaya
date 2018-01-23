<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
*/

// $route['website/(.*)/(.*)'] = 'website/navigation/$1';

$route['navigation/back-end/page/(:num)'] = 'website/navigation/back_end/$1';
$route['navigation/front-end/page/(:num)'] = 'website/navigation/front_end/$1';

$route['navigation/back-end/(:num)/update'] = 'website/navigation/update/$1';
$route['navigation/back-end/(:num)/edit'] = 'website/navigation/edit/$1';

$route['navigation/front-end/(:num)/update'] = 'website/navigation/update/$1';
$route['navigation/front-end/(:num)/edit'] = 'website/navigation/edit/$1';

$route['navigation/back-end/create'] = 'website/navigation/create';
$route['navigation/front-end/create'] = 'website/navigation/create';

$route['navigation/front-end/add'] = 'website/navigation/add';
$route['navigation/back-end/add'] = 'website/navigation/add';

$route['navigation/parent-slug'] = 'website/navigation/get_slug_parent';
$route['navigation/back-end'] = 'website/navigation/back_end';
$route['navigation/front-end'] = 'website/navigation/front_end';
$route['identity'] = 'website/identity/index';

/* End of file routes.php */
/* Location: ./application/modules/website/config/routes.php */