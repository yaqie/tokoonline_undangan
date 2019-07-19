<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['auth'] = 'home/auth';
$route['profil'] = 'home/profil';
$route['cara_pesan'] = 'home/cara_pesan';
$route['tentang_kami'] = 'home/tentang_kami';
$route['kontak'] = 'home/kontak';
$route['produk'] = 'home/produk';
$route['keranjang'] = 'home/keranjang';
$route['pesan/(:any)'] = 'home/pesan/$1';
$route['detail/(:num)'] = 'home/detail/$1';
$route['invoice/(:any)'] = 'home/invoice/$1';
