<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {
    public function view($slug = 'proplayerstore') {
        $this->load->model('Product_model');

        $data['title'] = 'Toko Seller - AkunMarket';
        $data['store'] = [
            'name' => 'ProPlayerStore',
            'slug' => $slug,
            'verified' => true,
            'description' => 'Toko terpercaya untuk akun game dan digital premium.',
            'joined' => 'Jan 2023',
            'response' => '98% (±15 menit)',
            'transactions' => '2.857+',
            'rating' => '4.9',
            'followers' => '3.621',
            'active_products' => '156',
            'completed_orders' => '2.714',
        ];
        $data['products'] = $this->Product_model->getPopularProducts(5);

        $this->load->view('layouts/header', $data);
        $this->load->view('seller/store', $data);
        $this->load->view('layouts/footer');
    }
}
