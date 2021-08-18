<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * ADMIN ROUTES
 */
// $route['admin'] = 'admin/Animasi/index';
$route['admin/login'] = 'User/index';
$route['admin/loggedin'] = 'User/login';
$route['admin/logout'] = 'User/logout';

// ROUTE FOR USER
$route['admin/pengaturan'] = 'admin/User/index';
$route['admin/pengaturan/update/(:num)'] = 'admin/User/update/$1';

// ROUTE FOR TAMBAH ADMIN
$route['admin/users'] = 'admin/User/index_users';
$route['admin/users/tambah'] = 'admin/User/tambah_admin';
$route['admin/users/simpan'] = 'admin/User/simpan_admin';
$route['admin/users/edit/(:num)'] = 'admin/User/edit/$1';
$route['admin/users/update/(:num)'] = 'admin/User/update/$1';
$route['admin/users/hapus/(:num)'] = 'admin/User/hapus/$1';

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
