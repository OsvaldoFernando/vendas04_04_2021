<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['modulo'] = 'Formas_pagamentos/index';
$route['modulo/add'] = 'Formas_pagamentos/add';
$route['modulo/edit/(:num)'] = 'Formas_pagamentos/edit/$1';
$route['modulo/del/(:num)'] = 'Formas_pagamentos/del/$1';
