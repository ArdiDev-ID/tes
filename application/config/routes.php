<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Buyer
$route['buyer/dashboard'] = 'buyer/dashboard/index';
$route['buyer/wallet'] = 'buyer/wallet/index';
$route['buyer/orders'] = 'buyer/orders/index';
$route['buyer/profile'] = 'buyer/profile/index';
$route['buyer/wishlist/toggle'] = 'buyer/wishlist/toggle';

// Seller
$route['seller/dashboard'] = 'seller/dashboard/index';
$route['seller/products'] = 'seller/products/index';
$route['seller/orders'] = 'seller/orders/index';

// Admin
$route['admin/dashboard'] = 'admin/dashboard/index';
$route['admin/products/review'] = 'admin/products/review';
$route['admin/orders'] = 'admin/orders/index';

// Payment callback
$route['payment/duitku/callback'] = 'payment/callback/duitku';

$route['product/(:num)'] = 'product/detail/$1';
$route['product'] = 'product/detail';

$route['checkout'] = 'checkout/index';
$route['checkout/(:num)'] = 'checkout/index/$1';
$route['order/status/(:any)'] = 'order/status/$1';
$route['order/status/(:any)/(:num)'] = 'order/status/$1/$2';
$route['order/confirm-safety/(:num)'] = 'order/confirm_safety/$1';

$route['seller/store'] = 'seller/store/view';
$route['seller/store/(:any)'] = 'seller/store/view/$1';
