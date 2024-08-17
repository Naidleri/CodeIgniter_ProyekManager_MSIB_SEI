<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'proyekcontroller';
$route['add_proyek'] = 'proyekcontroller/add_proyek';
$route['proyek/save'] = 'proyekcontroller/save_proyek';
$route['add_lokasi'] = 'proyekcontroller/add_lokasi';
$route['lokasi/save'] = 'proyekcontroller/save_lokasi';
$route['proyek/edit/(:num)'] = 'proyekcontroller/edit_proyek/$1';
$route['proyek/update/(:num)'] = 'proyekcontroller/update_proyek/$1';
$route['proyek/delete/(:num)'] = 'proyekcontroller/delete_proyek/$1';
$route['lokasi/edit/(:num)'] = 'proyekcontroller/edit_lokasi/$1';
$route['lokasi/update/(:num)'] = 'proyekcontroller/update_lokasi/$1';
$route['lokasi/delete/(:num)'] = 'proyekcontroller/delete_lokasi/$1';
