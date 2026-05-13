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
$route['admin/system-control'] = 'admin/system/control';

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
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['register'] = 'auth/register';

$route['admin/users'] = 'admin/users/index';
$route['admin/sellers'] = 'admin/sellers/index';
$route['admin/transactions'] = 'admin/transactions/index';
$route['admin/withdraw'] = 'admin/withdraw/index';
$route['admin/payment-gateway'] = 'admin/payment_gateway/index';
$route['admin/manual-payment'] = 'admin/manual_payment/index';
$route['admin/categories'] = 'admin/categories/index';
$route['admin/coupons'] = 'admin/coupons/index';
$route['admin/banners'] = 'admin/banners/index';
$route['admin/community'] = 'admin/community/index';
$route['admin/reports'] = 'admin/reports/index';
$route['admin/disputes'] = 'admin/disputes/index';
$route['admin/settings'] = 'admin/settings/index';
$route['admin/logs'] = 'admin/logs/index';
$route['admin/backup'] = 'admin/backup/index';
