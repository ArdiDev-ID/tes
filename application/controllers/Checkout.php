<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    public function index($productId = null) {
        $this->load->model('Product_model');

        $product = $productId ? $this->Product_model->getProductDetail((int) $productId) : null;
        if (!$product) {
            $product = $this->Product_model->getFallbackProduct();
        }

        $adminFee = 2500;
        $serviceFee = 5000;
        $promoDiscount = 10000;

        $data['title'] = 'Checkout - AkunMarket';
        $data['product'] = $product;
        $data['summary'] = [
            'admin_fee' => $adminFee,
            'service_fee' => $serviceFee,
            'promo_discount' => $promoDiscount,
            'total' => ((float) $product['price'] + $adminFee + $serviceFee) - $promoDiscount,
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('checkout', $data);
        $this->load->view('layouts/footer');
    }
}
