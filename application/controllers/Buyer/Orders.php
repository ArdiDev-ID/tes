<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
    public function index() {
        $this->load->model('Order_model');

        $filters = [
            'q' => $this->input->get('q', true),
            'status' => $this->input->get('status', true) ?: 'semua',
        ];

        $data['title'] = 'Riwayat Pembelian';
        $data['filters'] = $filters;
        $data['orders'] = $this->Order_model->getBuyerPurchaseHistory($filters);
        $data['stats'] = $this->Order_model->getBuyerPurchaseStats();

        $this->load->view('layouts/header', $data);
        $this->load->view('buyer/orders', $data);
        $this->load->view('layouts/footer');
    }
}
