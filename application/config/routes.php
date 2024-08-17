<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'proyekcontroller';
$route['add_proyek'] = 'proyekcontroller/add_proyek';
$route['proyek/save'] = 'proyekcontroller/save_proyek';
$route['add_lokasi'] = 'proyekcontroller/add_lokasi';
$route['lokasi/save'] = 'proyekcontroller/save_lokasi';