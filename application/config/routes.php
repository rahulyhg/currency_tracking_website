<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['categories'] = 'categories/view';
$route['productgraph'] = 'categories/productgraph';

$route['user_dashboard'] = 'pages/view2';
$route['register'] = 'user/register';
$route['login'] = 'user/login';
$route['logout'] = 'user/logout';
$route['homepage'] = 'pages/homepage';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
